__author__ = 'saurabh'
import os,sys
BASE_DIR = os.path.realpath(sys.argv[0]).split('Social_Manager/')[0]
sys.path.append(BASE_DIR)

class Posting():
    def __init__(self):
        self.access_token="1425161467767256|NhF9K2ZLgNmKyhLx9q3TjM8-pvk"
        self.copy_page_id="funnymiku.in"

    def get_choice(self):
        os.system("clear")
        print "1. Upload Post To Website"

        choice = int(raw_input("\n\n>>\t"))
        if choice == 1:
            self.check_make_image_data()
        # elif choice == 2:
        #     self.post_image()

    def check_make_image_data(self):
        from src.helper.make_image_data import make_image_data
        copy_page_id = raw_input("page > ")
        type = raw_input("type > ")
        make_image_data(access_token=self.access_token, copy_page_id=copy_page_id, type=type)


def init():
    a = Posting()
    a.get_choice()

if __name__ == '__main__':
    init()