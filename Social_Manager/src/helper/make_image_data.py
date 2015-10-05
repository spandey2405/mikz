__author__ = 'saurabh'
import sys,os
BASE_DIR = os.path.realpath(sys.argv[0]).split('/Social_Manager')[0]
sys.path.append(BASE_DIR)
from src.helper.get_fb_post import get_post,format_message,get_title,get_file_name,count_lines,next_page
import src.db_handler.database as db
from src.conf import loggingmix
from src.helper.upload import upload_image
from src.helper.upload import upload_data
def make_image_data(copy_page_id, access_token, type):
    choice = "y"
    parameters = None
    while (choice != "n"):
        os.system("clear")
        posts = get_post(copy_page_id,access_token,limit=1, parameters=parameters)
        for post in posts:
            try:
                message = format_message(post["message"])
                post_id = post["id"]
                lines = count_lines(message)
                title = get_title(message)
                file = post_id+".jpeg"
                data = {"title":title, "file":file, "fbid":post_id,'msg':message}
                data2 = {"fbid":post_id}
                status= db.write_data(data2)
                if status == True:
                    print(message)
                    choice_post = raw_input("\nPress Enter To post .... \nPress x to see next post\nCtrl + Z to Exit")
                    if choice_post !="x":
                        data1 = {"file":post_id, 'msg':message}
                        upload_image(data1)
                        data2 = {'p':1,'key':'65418897295aa863cb71ebdf3f36c73f',"file":file,"by":"Miku","title":title,"type":type}
                        upload_data(data2)
                        loggingmix.DEBUG("File : " +file+ "Created Sucessfully")

            except Exception as e:
                print e

        parameters = next_page(copy_page_id, access_token, limit=1, parameters=parameters)
