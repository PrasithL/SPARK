// this array has the IDs and the parents of the menu items in the sidebar
var menu_list = {
    'Dashboard' : {
       'parent' : 'none'
    },

    'User Management' : {
        'parent' : 'none'
    },

    'SPARK Explorer' : {
        'parent' : 'none'
    },

    'Data Management' : {
        'parent' : 'none'
    },

        'Room Details' : {
           'parent' : 'Data Management'
        },

        'Computer Details' : {
           'parent' : 'Data Management'
        },

        'Software List' : {
           'parent' : 'Data Management'
        },

    'Maintenance' : {
       'parent' : 'none'
    },

        'Issues' : {
           'parent' : 'Maintenance'
        },

        'Add Maintenance Records' : {
           'parent' : 'Maintenance'
        },

        'Maintenance Schedule' : {
           'parent' : 'Maintenance'
        },

    'Inventory' : {
       'parent' : 'none'
    },

    'Backups' : {
       'parent' : 'none'
    },

        'Backup History' : {
           'parent' : 'Backups'
        },

        'Backup Schedule' : {
           'parent' : 'Backups'
        },

    'To-do Tasks' : {
       'parent' : 'none'
    },

    'Reports' : {
       'parent' : 'none'
   },

       'Inventory Overview Report' : {
          'parent' : 'Reports'
       },

       'Issues Overview Report' : {
          'parent' : 'Reports'
       },
 };

// current page name is stored as a JS variable in the page itself

var breadcrumbs = [];//let's create our breadcrumbs array as well

//make_me should be a reference to current_item not a copy of it
var mark_me = menu_list[current_page];
var open = false;
var parent_id;

while(true) {//you can also use a recursive function instead of a loop
  mark_me['active'] = true;//mark this as "active"
  document.getElementById(current_page).className += ' active';
  if( open ) document.getElementById(parent_id).className += ' active';//mark this as "open"

  breadcrumbs.push(mark_me);

  parent_id = mark_me['parent'];//see if it has a parent
  if( parent_id == null || !(parent_id in menu_list) ) break;//if not, break

  mark_me = menu_list[parent_id];//set item's parent as the new "mark_me" and repeat
  open = true;//parent elements should be marked as "open" too
}

var output = '';
for(var id in menu_list) if(menu_list.hasOwnProperty(id)) {
  var menu_item = menu_list[id];
  output += '<li class="';
   if( menu_item['active'] ) output += 'active';
   if( menu_item['open'] ) output += ' open';
  output += '">';
  //something like <li class="active open"> will be printed
  //...
  //print other parts of menu item
}

//now we also have a list of breadcrumb items to print later
