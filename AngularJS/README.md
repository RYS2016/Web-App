Using AngularJS, modify the Shopping Cart.

•	The total value of the ordered books is now displayed on the table header row last column. This value should change whenever the inputs affecting the total change.

•	The title, quantity, and unit price are editable inputs. Changing the quantity or the unit price should be reflected in the line total and the order total.

•	The Remove button removes the respective book from the model. The view is automatically updated.

•	The New button will add a new book object to the model. The default title will be “New Book” with quantity 1 and unit price of 10.99 as shown below. Clicking on this button will insert one new book each time it is clicked. After one click, the layout is shown below.


The Save button stores the list of current books and their state into Local Storage. When the application is loaded, check in the local storage first if the books are already stored. If they are, use the stored data for the application. If the item is not there in local storage, use the default list of books as shown in the first figure. Use a single key named lastName_cart in the local storage for managing the state of the shopping cart. Use AngularJS module for the application


AngularJS Filters 

Using AngularJS, write the filter tokenize that can take an optional argument for the delimiter. By default, the filter produces a comma separated string of the individual characters of the given input. If the delimiter is provided, the individual characters in the input string are separated by the specified delimiter. For example,


Write the filter in a module. Now, use the filter to develop the Angular application. The controller provides the initial values for the two model properties, the input string and the delimiter string. Sample outputs are shown below.
