__author__ = 'saurabh'

import os,sys
BASE_DIR = os.path.realpath(sys.argv[0]).split('/Social_Manager')[0]
sys.path.append(BASE_DIR)
import requests
def upload_image():

    payload = {'msg':'Depending on which \nversion of the GD library \nPHP is using, when fontfile \ndoes not begin with a leading\n  then .ttf will be appended to the \nfilename and the library will attempt \nto search for that filename along \na library-defined font path.','file':'1124536_25158164'}
    r = requests.get('http://localhost/httpdocs/create-image.php?p=1',params=payload)
    print r.json()

def upload_data():
    payload = {'p':1,'key':'65418897295aa863cb71ebdf3f36c73f','title':'testpost123','file':'11211211121.png','by':'miku','type':'shayari'}
    url = 'http://localhost/api/v1.0/insert.php'
    r = requests.get(url=url,params=payload)
    print r.json()

count = 1
for i in range (30,40):
    file = "file"+str(i)+".jpeg"
    title = "title"+str(1)
    payload = {'p':1,'key':'YLsDS4paBS0H8hKNCK1BUQOZGyx8WAk','title':title,'file':file,'by':'miku','type':'posts'}
    url = 'http://localhost/api.funnymiku.in/v1.0/insert.php'
    r = requests.get(url=url,params=payload)
    print r.json()
