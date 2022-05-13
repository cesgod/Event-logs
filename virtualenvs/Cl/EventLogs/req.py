#!/usr/bin/env python3
from zeep import Client
from zeep import xsd
from datetime import date, datetime, timedelta
import datetime
import json
#import numpy as np




#currentMonth = datetime.now().month


with open('/var/www/html/projects/Event-logs/Eventlogs/date/stereq.json', 'r') as f:
    rangeib = json.load(f)
nlim=len(rangeib)
for i in range(nlim):
    day1 	= int(rangeib['range01']['day1'])
    day1s 	= int(rangeib['range01']['day1s'])
    month1 	= int(rangeib['range01']['month1'])
    month1s = int(rangeib['range01']['month1s'])
    year1 	= int(rangeib['range01']['year1'])
    year1s	= int(rangeib['range01']['year1s'])
    day2 	= int(rangeib['range01']['day2'])
    month2 	= int(rangeib['range01']['month2'])
    year2 	= int(rangeib['range01']['year2'])
    #meterd 	= rangeib['range01']['meter']

print(day1, month1, year1, day2, month2, year2)

maxdata=0;
timestamp=""
f_date = date(year1, month1, day1)
l_date = date(year2, month2, day2)
delta = l_date - f_date
print("days in between: ", delta.days)
#meter = meterd
bwsdl = "http://clvmweb.clyfsa.com:81/SEP2WebServices/DataService.svc?singleWsdl"
bclient = Client(bwsdl)
minute="00"
hour=0
sminute=""
alldvcs=[]
hcount=0
months=month1
days=0
month2=str(month2)
if (len(month2)==1):
	month2="0"+month2
#if (day1!= 1):
	#days=day1-1
#else:
	#days=30
	#months=month1-1

hib=0
mlen=len(minute)
cc=0

month1s=str(month1s)
if (len(month1s)==1):
	month1s="0"+month1s
#hlen=len(hour)
day1s=str(day1s)
day1=str(day1)
month1=str(month1)
if (len(day1s)==1):
	day1s="0"+day1s
if (len(month1)==1):
	month1="0"+month1


#month2
month2=str(month2)
if (len(month2)==1):
	month2="0"+month2
#hlen=len(hour)
day2=str(day2)
if (len(day2)==1):
	day2="0"+day2


startdate = str(year1s)+"-"+month1s+"-"+day1s+"T03:00:00"
sminute = str(year2)+"-"+month2+"-"+day2+"T03:00:00"
print(startdate)
print(sminute)
print(mlen)
print(day1, len(day1))
wlimit=(delta.days+1)*96
print("limite: ",wlimit)





#print(currentMonth)
wsdl = "http://clvmweb.clyfsa.com:81/SEP2WebServices/ManagementService.svc?singleWsdl"
client = Client(wsdl)



#request_data ={
#    "groupReference": {
#      "Name": "PDS EXCLUSIVOS Activos",
#    } 
#  }
#response = client.service.QueryGroupMembers(**request_data)
request_data_amt ={
    "groupReference": {
      "Name": "Active-AM550-T",
    }
  }
responseamt = client.service.QueryGroupMembers(**request_data_amt)
request_data_amm ={
    "groupReference": {
      "Name": "Active-AM550-E",
    }
  }
responseamm = client.service.QueryGroupMembers(**request_data_amm)
#print (response)
#Here 'request_data' is the request parameter dictionary.
#Assuming that the operation named 'sendData' is defined in the passed wsdl.
#print (response)
#lim = len(response["Devices"]["DeviceReference"])
limamt = len(responseamt["Devices"]["DeviceReference"])
limamm = len(responseamm["Devices"]["DeviceReference"])
flim=limamm+limamt
devices_all= []
devices_conn=[]
devices_rconn=[]
allmtsc=[]
allmtsr=[]
allmts=[]
rc="Remote Connection"
dc="Remote Disconnection"
#for j in range (lim):
#	devices_all.append(response["Devices"]["DeviceReference"][j]["Name"])
for k in range (limamt):
	devices_all.append(responseamt["Devices"]["DeviceReference"][k]["Name"])
for l in range (limamm):
	devices_all.append(responseamm["Devices"]["DeviceReference"][l]["Name"])
limit = len(devices_all)
dconn   =   0
conn    =   0
wsdl = "http://clvmweb.clyfsa.com:81/SEP2WebServices/DataService.svc?singleWsdl"
client = Client(wsdl)

for y in range (limit):
    arequest_data = {
                        "eventLogs":
                        {
                            "EventLogReference":
                            {
                                "Name": "DisconnectorControlEventLog",
                                "DeviceReference":
                                {
                                    "Name": devices_all[y],
                                }
                            }
                        },
                        "intervalStart": startdate,
                        "intervalEnd": sminute
                    }	
    aresponse = client.service.QueryEventLog(**arequest_data)
    #print (aresponse)
    #print (devices_all[y])
    #print(len(aresponse[0].Events.EventInfo))
    
    if (aresponse[0].Events is not None):
        lim =len(aresponse[0].Events.EventInfo)
    else:
        lim=0
    for x in range (lim):
        if (aresponse is not None):
            if (aresponse[0].Events is not None):
                if (aresponse[0].Events.EventInfo is not None):
                    if (aresponse[0].Events.EventInfo[x] is not None):
                        #print(aresponse[0].Events.EventInfo[0].EventType)
                        if (aresponse[0].Events.EventInfo[x].EventType == 1519):
                            print(devices_all[y], "Remote Connection", aresponse[0].Events.EventInfo[x].Timestamp)
                            conn = conn + 1
                            allmtsc.append((aresponse[0].Events.EventInfo[x].Timestamp - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M"))
                            allmtsc.append(devices_all[y])
                            allmts.append(devices_all[y])
                            allmts.append((aresponse[0].Events.EventInfo[x].Timestamp - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M"))
                            allmts.append(rc)
                           #allmts.append({'MeterName':devices_all[y]})
                            #allmts[x]["MeterName"]=devices_all[y]
                            #allmts[x]["Date"]=(aresponse[0].Events.EventInfo[x].Timestamp - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M")
                            #allmts[x]["Event"]=rc
                        if (aresponse[0].Events.EventInfo[x].EventType == 1518):
                            print(devices_all[y], "Remote Disconnection", aresponse[0].Events.EventInfo[x].Timestamp)
                            dconn = dconn + 1
                            allmtsr.append((aresponse[0].Events.EventInfo[x].Timestamp - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M"))
                            allmtsr.append(devices_all[y])
                            allmts.append(devices_all[y])
                            allmts.append((aresponse[0].Events.EventInfo[x].Timestamp - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M"))
                            allmts.append(dc)
                            #allmts.append({'Num':devices_all[y]})
                            #allmts.append({'MeterName':devices_all[y]})
                            #allmts[x]["MeterName"]=devices_all[y]
                            #allmts[x]["Date"]=(aresponse[0].Events.EventInfo[x].Timestamp - timedelta(hours=3)).strftime("%d-%m-%Y %H:%M")
                            #allmts[x]["Event"]=dc
print("Total Remote Connection: ", conn)
print("Total Remote Disconnection: ", dconn)

#with open('/var/www/html/virtualenvs/Cl/EventLogs/doc_conn.json', 'w', encoding='utf-8') as f:
#    json.dump(allmtsc, f, ensure_ascii=False, indent=4)

#with open('/var/www/html/virtualenvs/Cl/EventLogs/doc_rconn.json', 'w', encoding='utf-8') as f:
#    json.dump(allmtsr, f, ensure_ascii=False, indent=4)

with open('/var/www/html/projects/Event-logs/virtualenvs/Cl/EventLogs/doc_allconn.json', 'w', encoding='utf-8') as f:
    json.dump(allmts, f, ensure_ascii=False, indent=4)