# LibraryManagementSystem
It is a library management system web application which uses HTMLJavaScript,jQuery,Ajax and Bootstrap for front-end and PHP for it s back-end. 
Student side :
--------------
 * Registration with checks on email,password,regno etc and a hash variable.
 
 * Login through modal and session variables set.
 
 * Forgot password ,a reset link will be sent to mail then password can be reset only if hash is matched.
 
 * New Arrivals and Notices section -Loads dynamically data from server using load and setInterval functions.
   Only new 10 books and notices will appear in these sections.

 * Book search- 
        * User can search through name/author_name.
        * Location and no of copies will be shown.
        * Add button will be there if user is logged in.
        * User can add book by clicking on its respective Add button to their list.
        * Various restrictions such as not addition of duplicate books is allowed,no of books/user is checked while adding
        * List can be opened from the Drop down menu.
        * User can delete or submit his list.
        * Resubmit option will be available till books are not issued.
        * After submission user can't add books .
__________________________________________________________________________________________________________________________
 

 Admin side:
 -----------

 * Admin page will open through a login page,direct access is prohiboted by cookie.
 
 * Issue - Books get issued with automatic rerieval of date etc. And mail is sent to user informing about this.
 
 * Return - Books get returned and fine is calculated and added from return date to the day of submission.
 
 * Search User - Entering regno will dipplay user's all info. Clicking on fine button will pay the fine.
 
 * Issue list and Return List will show all stats transactions with a link to user attached in each row.
 
 * Add Book
      *New Book-A form will appear with a id prefilled. Submit it with all details and it will began to show in user's    portal.
      *Old Book - If book is there then with its id only add copies of that book.

* Add notice - It will allow to add a new notice.      

* TLB Section:
     Requests- Check requests made by users .
     Issue and return.
     Stats will be maintained in lists.
