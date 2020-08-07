let login = require('./components/auth/Login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/Logout.vue').default;

let home = require('./components/Home.vue').default;

// Empoyee Component
let storeemployee = require('./components/employee/Create.vue').default;
let employee = require('./components/employee/Index.vue').default;
let editemployee = require('./components/employee/Edit.vue').default;

// Supplier Component
let storesupplier = require('./components/supplier/Create.vue').default;
let supplier = require('./components/supplier/Index.vue').default;
let editsupplier = require('./components/supplier/Edit.vue').default;

// Category Component
let storecategory = require('./components/category/Create.vue').default;
let category = require('./components/category/Index.vue').default;
let editcategory = require('./components/category/Edit.vue').default;
// Product Component
let storeproduct = require('./components/product/Create.vue').default;
let product = require('./components/product/Index.vue').default;
let editproduct = require('./components/product/Edit.vue').default;

// Expense Component
let storeexpense = require('./components/expense/create.vue').default;
let expense = require('./components/expense/expense.vue').default;
let editexpense = require('./components/expense/edit.vue').default;

// Salary Component
let salary = require('./components/salary/all_employee.vue').default;
let paysalary = require('./components/salary/create.vue').default;

let allsalary = require('./components/salary/index.vue').default;
let viewsalary = require('./components/salary/view.vue').default;
let editsalary = require('./components/salary/edit.vue').default;

// Stock Component
let stock = require('./components/product/stock.vue').default;
let editstock = require('./components/product/edit-stock.vue').default;

// Customer Component
let storecustomer = require('./components/customer/create.vue').default;
let customer = require('./components/customer/index.vue').default;
let editcustomer = require('./components/customer/edit.vue').default;
// POS Component
let pos = require('./components/pos/pointofsale.vue').default;

// Order Component
let order = require('./components/order/order.vue').default;
let vieworder = require('./components/order/vieworder.vue').default;
let searchorder = require('./components/order/search.vue').default;

// route
export let routes = [
    { path: '/', name: 'login', component: login },
    { path: '/register', name: 'register', component: register },
    { path: '/forget', name: 'forget', component: forget },
    { path: '/logout', name: 'logout', component: logout },

    { path: '/home', name: 'home', component: home },
    // Employee Routes
    { path: '/store-employee', component: storeemployee, name: 'store-employee' },
    { path: '/employee', component: employee, name: 'employee' },
    { path: '/edit-employee/:id', component: editemployee, name: 'edit-employee' },

    // Supplier Routes
    { path: '/store-supplier', component: storesupplier, name: 'store-supplier' },
    { path: '/supplier', component: supplier, name: 'supplier' },
    { path: '/edit-supplier/:id', component: editsupplier, name: 'edit-supplier' },


    // Category Routes
    { path: '/store-category', component: storecategory, name: 'store-category' },
    { path: '/category', component: category, name: 'category' },
    { path: '/edit-category/:id', component: editcategory, name: 'edit-category' },

    // Product Routes
    { path: '/store-product', component: storeproduct, name: 'store-product' },
    { path: '/product', component: product, name: 'product' },
    { path: '/edit-product/:id', component: editproduct, name: 'edit-product' },

    // Expense Routes
    { path: '/store-expense', component: storeexpense, name: 'store-expense' },
    { path: '/expense', component: expense, name: 'expense' },
    { path: '/edit-expense/:id', component: editexpense, name: 'edit-expense' },

    // Salary Routes
    { path: '/given-salary', component: salary, name: 'given-salary' },
    { path: '/pay-salary/:id', component: paysalary, name: 'pay-salary' },

    { path: '/salary', component: allsalary, name: 'salary' },
    { path: '/view-salary/:id', component: viewsalary, name: 'view-salary' },
    { path: '/edit-salary/:id', component: editsalary, name: 'edit-salary' },

    // Customer Routes
    { path: '/store-customer', component: storecustomer, name: 'store-customer' },
    { path: '/customer', component: customer, name: 'customer' },
    { path: '/edit-customer/:id', component: editcustomer, name: 'edit-customer' },

    // Stock Routes
    { path: '/stock', component: stock, name: 'stock' },
    { path: '/edit-stock/:id', component: editstock, name: 'edit-stock' },

    // POS Routes
    { path: '/pos', component: pos, name: 'pos' },

    // Order Routes
    { path: '/order', component: order, name: 'order' },
    { path: '/view-order/:id', component: vieworder, name: 'view-order' },
    { path: '/searchorder', component: searchorder, name: 'searchorder' },

]