# Python script to read data from json and output the SQL query 
import json, calendar

conversion = {v: k for k,v in enumerate(calendar.month_abbr)}


with open('D:/xampp/htdocs/backend_project/xrpData.json', 'r') as dataFile:
    data = json.load(dataFile)
    del data['Apr 06, 2020']
    for item in data:
        data[item]['Date'] = (' {:02d}'.format(conversion[data[item]['Date'][0:3]]) + data[item]['Date'][3:])
        data[item]['Date'] = (data[item]['Date'][-4:] + data[item]['Date'][0:6]).replace(' ', '-')
        data[item]['Date'] = data[item]['Date'].replace(',', '')

    with open('xrpsqlStatement.txt', 'w+') as txt:
        for item in data:
            txt.write('INSERT INTO Bitcoin (day, open, close, high, low) VALUES(\'{}\', {},{}, {}, {});\n'.format(data[item]['Date'], float(data[item]['Open'].replace(',','')), float(data[item]['Close'].replace(',','')), float(data[item]['High'].replace(',','')), float(data[item]['Low'].replace(',','')) ))
        
