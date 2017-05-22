# Creates new auth.User object in the database.
#
# Any parameters which MAY have spaces or restricted characters should
# be passed using single quotes-i.e. '$param'
# Usage:
#    python createobserver.py user_id role phone_number locations subcounty
#
# Arguments:
#    user_id The row id of the user record
#    role  The "role" of the observer-must be "vht", "midwife", "admin", "none"
#    phone_number A valid phone number
#    locations Comma separated list of valid long values-i.e. "1L,2L,3L" or "1,2,3"
#    subcounty Long value representing the Subcounty row id
# Returns: The row id of the new record as a long value-i.e. 2L
#          -1L if the creation was unsuccessful
import sys, os
sys.path.append('/opt/sana/sana.mds')
os.environ['DJANGO_SETTINGS_MODULE'] = 'mds.settings'
from django.conf import settings

from django.contrib.auth.models import User

from mds.core.models import *

result =  -1L
user = None
observer = None
try:
    user = User.objects.get(id=long(sys.argv[1]))
    observer = Observer()
    observer.user = user
    observer.role = sys.argv[2]
    observer.phone_number = sys.argv[3]
    locaton_ids = [long(x) for x in sys.argv[4].split(",")]
    observer.locations = Location.objects.filter(id__in=location_ids)
    observer.subcounty = Subcounty.objects.get(id=long(sys.argv[5]))
    observer.save()
    result = Observer.objects.get(user__id=user.id).id
except:
    pass
print(result)

