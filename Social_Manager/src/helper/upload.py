__author__ = 'saurabh'

import os,sys
BASE_DIR = os.path.realpath(sys.argv[0]).split('/Social_Manager')[0]
sys.path.append(BASE_DIR)
import requests
from src.conf import loggingmix

def upload_image(data):
    # r = requests.get('http://funnymiku.in/create-image.php',params=data)
    loggingmix.IMGCREATE(data)


def upload_data(data):
    url = 'http://api.funnymiku.in/v1.0/insert.php'
    # r = requests.get(url=url,params=data)
    # loggingmix.IMGCREATE(r.text)
    from src.db_handler import database
    database.write_data(data=data["file"])