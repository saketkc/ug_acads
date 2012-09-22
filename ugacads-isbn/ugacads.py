import datetime
import wsgiref.handlers
from BeautifulSoup.BeautifulSoup import BeautifulSoup as BS
import isbndbpy
from google.appengine.ext import webapp
from google.appengine.ext.webapp.util import run_wsgi_app
from google.appengine.api import mail

class MainPage(webapp.RequestHandler):
    def get(self):
         self.response.out.write(""" <html>
            <body>
              <form action="/search" method="get">
              <table>
                <tr>
					<td><label>Search</label></td>
					<td><input type="text" name="search"></td>
				</tr>
                </table>
                <div><input type="submit" value="Fire"></div>
              </form>
            </body>
          </html>""")


    def post(self):
        self.response.headers['Content-Type'] = 'text/plain'
        self.response.out.write(self.request.get('testparam'))

class Search(webapp.RequestHandler):
    def get(self):
        bookname  = self.request.get('search')
        req = isbndbpy.Request('books', 'combined', str(bookname))
        resp = req.send().read()
        #print resp
        soup = BS(str(resp))
        books = soup.findAll('bookdata')
        self.response.out.write('<html><body>')
        for bookdata in books:
            self.response.out.write('<br/>Title: '+ str(bookdata.find('title').string ))
            self.response.out.write('<br/>ISBN: ' +str(bookdata.get('isbn13')))
            self.response.out.write('<br/>AUTHOR :'+str( bookdata.find('authorstext').string))
            self.response.out.write('<br/>PUBLISEHR: '+str(bookdata.find('publishertext').string))
            self.response.out.write('<br/> "***********')


application = webapp.WSGIApplication(
                                     [('/', MainPage),('/search',Search),],
                                     debug=True)

def main():
    run_wsgi_app(application)

if __name__ == "__main__":
    main()
