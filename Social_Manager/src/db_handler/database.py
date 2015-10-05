__author__ = 'saurabh'

import csv,sys
from src.conf.conf import database
from src.conf import loggingmix

def write_data(data):
    status = False
    try :
        with open(database+'mikudb.csv', 'a') as csvfile:
            fieldnames = ['fbid']
            writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
            check_status = get_data(data["fbid"])
            if check_status != True:
                status = True
                writer.writerow(data)


        loggingmix.DEBUG(data)
    except Exception as e:
        loggingmix.IMGCREATE("FileName : database.py :Function :Write Data Error:"+str(e))
        pass


    return status

def get_data(fbid):
    status = False
    with open(database+'mikudb.csv') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            if row["fbid"]==fbid:
                status = True

    return status
# payload = {'key': 'miku@123riks1121u-sucess-insert', 'file': file, 'title': title, 'by': by }
def read_from_filename(filename):
    row = None
    data = {}
    data['key']='miku@123riks1121u-sucess-insert'
    data['by']='Miku'
    with open(database+'mikudb.csv') as csvfile:
        reader = csv.DictReader(csvfile)
        for row in reader:
            if row["file"]==filename:
                data["file"] = row["file"]
                data["title"] = row["title"]

    return data


# print write_data({'title': 'Checking A File', 'filename':"filexyz.png", "fbid":"11211121_4564789"})
