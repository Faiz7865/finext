<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Employee\LeadController as EmployeeLeadController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Helper function for admin check
if (!function_exists('adminCheck')) {
    function adminCheck() {
        if (Auth::check() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }
    }
}

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy');

Route::get('/refund-policy', function () {
    return view('refund-policy');
})->name('refund');

Route::get('/fintech-software-development', function () {
    return view('fintech-software-development');
})->name('fintech-software-development');

// Public Lead Routes
Route::get('/lead', [LeadController::class, 'show'])->name('lead');
Route::post('/lead/submit', [LeadController::class, 'submit'])->name('lead.submit');
Route::get('/lead/verify', [LeadController::class, 'showVerify'])->name('lead.verify');
Route::post('/lead/verify', [LeadController::class, 'verify'])->name('lead.verify.post');
Route::post('/lead/resend-otp', [LeadController::class, 'resendOtp'])->name('lead.resend-otp');

// Laravel 12 Built-in Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes - Using controller constructors for admin check
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Leads CRUD
    Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/create', [AdminLeadController::class, 'create'])->name('leads.create');
    Route::post('/leads', [AdminLeadController::class, 'store'])->name('leads.store');
    Route::get('/leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::get('/leads/{lead}/edit', [AdminLeadController::class, 'edit'])->name('leads.edit');
    Route::put('/leads/{lead}', [AdminLeadController::class, 'update'])->name('leads.update');
    Route::delete('/leads/{lead}', [AdminLeadController::class, 'destroy'])->name('leads.destroy');
    Route::post('/leads/{lead}/assign', [AdminLeadController::class, 'assign'])->name('leads.assign');
    Route::post('/leads/{lead}/remark', [AdminLeadController::class, 'addRemark'])->name('leads.remark');

    // Employees CRUD
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    // Invoices CRUD
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    Route::get('/invoices/{invoice}/pdf', [InvoiceController::class, 'downloadPdf'])->name('invoices.pdf');

    // Clients CRUD
    Route::resource('/clients', ClientController::class);
    Route::get('/clients/{client}/statement', [ClientController::class, 'statement'])->name('clients.statement');
    Route::get('/clients/{client}/statement/pdf', [ClientController::class, 'statementPdf'])->name('clients.statement.pdf');

    // Items CRUD
    Route::resource('/items', ItemController::class);

    // Payments
    Route::post('/invoices/{invoice}/payments', [PaymentController::class, 'store'])->name('invoices.payments.store');
    Route::get('/payments/{payment}/receipt', [PaymentController::class, 'receipt'])->name('payments.receipt');
});

// Employee Routes
Route::middleware(['auth'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [EmployeeDashboardController::class, 'index'])->name('dashboard');
    Route::get('/leads', [EmployeeLeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/{lead}', [EmployeeLeadController::class, 'show'])->name('leads.show');
    Route::post('/leads/{lead}/remark', [EmployeeLeadController::class, 'addRemark'])->name('leads.remark');
});

Route::get('/aeps-admin-software', function () {
    return view('aeps-admin-software');
})->name('aeps-admin-software');

Route::get('/recharge-admin-software', function () {
    return view('recharge-admin-software');
})->name('recharge-admin-software');

Route::get('/ecommerce-software', function () {
    return view('ecommerce-software');
})->name('ecommerce-software');

Route::get('/api-development', function () {
    return view('api-development');
})->name('api-development');

Route::get('/pancard-admin-software', function () {
    return view('pancard-admin-software');
})->name('pancard-admin-software');

Route::get('/custom-web-development', function () {
    return view('custom-web-development');
})->name('custom-web-development');

Route::get('/mobile-app-development', function () {
    return view('mobile-app-development');
})->name('mobile-app-development');

Route::get('/ui-ux-design', function () {
    return view('ui-ux-design');
})->name('ui-ux-design');