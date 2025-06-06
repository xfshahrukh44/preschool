<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProviderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear-config', function () {
    Artisan::call('config:clear');
    return "config is cleared";
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});



if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}



//===================== Admin Routes =====================//

Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'admin', 'prefix' => 'admin'], function () {


    Route::get('/', 'Admin\AdminController@dashboard');

    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');

    Route::get('account/settings', 'Admin\UsersController@getSettings');
    Route::post('account/settings', 'Admin\UsersController@saveSettings');

    Route::get('project', function () {
        return view('dashboard.index-project');
    });

    Route::get('analytics', function () {
        return view('admin.dashboard.index-analytics');
    });


    Route::get('logo/edit', 'Admin\AdminController@logoEdit')->name('admin.logo.edit');
    Route::post('logo/upload', 'Admin\AdminController@logoUpload')->name('logo_upload');

    Route::get('favicon/edit', 'Admin\AdminController@faviconEdit')->name('admin.favicon.edit');

    Route::post('favicon/upload', 'Admin\AdminController@faviconUpload')->name('favicon_upload');

    Route::get('config/setting', 'Admin\AdminController@configSetting')->name('admin.config.setting');

    Route::get('contact/inquiries', 'Admin\AdminController@contactSubmissions');
    Route::get('contact/inquiries/{id}', 'Admin\AdminController@inquiryshow');
    Route::get('newsletter/inquiries', 'Admin\AdminController@newsletterInquiries');

    Route::any('contact/submissions/delete/{id}', 'Admin\AdminController@contactSubmissionsDelete');
    Route::any('newsletter/inquiries/delete/{id}', 'Admin\AdminController@newsletterInquiriesDelete');

    /* Config Setting Form Submit Route */
    Route::post('config/setting', 'Admin\AdminController@configSettingUpdate')->name('config_settings_update');


    //==============================================================//


    //==================== Error pages Routes ====================//

    Route::get('403', function () {
        return view('pages.403');
    });

    Route::get('404', function () {
        return view('pages.404');
    });

    Route::get('405', function () {
        return view('pages.405');
    });

    Route::get('500', function () {
        return view('pages.500');
    });

    //============================================================//

    #Permission management
    Route::get('permission-management', 'PermissionController@getIndex');
    Route::get('permission/create', 'PermissionController@create');
    Route::post('permission/create', 'PermissionController@save');
    Route::get('permission/delete/{id}', 'PermissionController@delete');
    Route::get('permission/edit/{id}', 'PermissionController@edit');
    Route::post('permission/edit/{id}', 'PermissionController@update');

    #Role management
    Route::get('role-management', 'RoleController@getIndex');
    Route::get('role/create', 'RoleController@create');
    Route::post('role/create', 'RoleController@save');
    Route::get('role/delete/{id}', 'RoleController@delete');
    Route::get('role/edit/{id}', 'RoleController@edit');
    Route::post('role/edit/{id}', 'RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log', 'LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users', 'Admin\\UsersController@Index');
    Route::get('user/create', 'Admin\\UsersController@create');
    Route::post('user/create', 'Admin\\UsersController@save');
    Route::get('user/edit/{id}', 'Admin\\UsersController@edit');
    Route::post('user/edit/{id}', 'Admin\\UsersController@update');
    Route::get('user/delete/{id}', 'Admin\\UsersController@destroy');
    Route::get('user/deleted/', 'Admin\\UsersController@getDeletedUsers');
    Route::get('user/restore/{id}', 'Admin\\UsersController@restoreUser');


    Route::resource('product', 'Admin\\ProductController');
    Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'Admin\\ProductController@destroy']);
    Route::get('order/list', ['as' => 'order.list', 'uses' => 'Admin\\ProductController@orderList']);
    Route::get('order/detail/{id}', ['as' => 'order.list.detail', 'uses' => 'Admin\\ProductController@orderListDetail']);

    //Order Status Change Routes//
    Route::get('status/completed/{id}', 'Admin\\ProductController@updatestatuscompleted')->name('status.completed');
    Route::get('status/pending/{id}', 'Admin\\ProductController@updatestatusPending')->name('status.pending');

    //childcares
    Route::get('childcares', [\App\Http\Controllers\ChildcareController::class, 'index'])->name('admin.childcare.index');
    Route::get('childcares/create', [\App\Http\Controllers\ChildcareController::class, 'create'])->name('admin.childcare.create');
    Route::post('childcares/store', [\App\Http\Controllers\ChildcareController::class, 'store'])->name('admin.childcare.store');
    Route::get('childcares/edit/{id}', [\App\Http\Controllers\ChildcareController::class, 'edit'])->name('admin.childcare.edit');
    Route::post('childcares/update/{id}', [\App\Http\Controllers\ChildcareController::class, 'update'])->name('admin.childcare.update');
    Route::get('childcares/destroy/{id}', [\App\Http\Controllers\ChildcareController::class, 'destroy'])->name('admin.childcare.destroy');


});

//==============================================================//

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/', 'Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();


//===================== Account Area Routes =====================//


Route::get('signin', 'GuestController@signin')->name('signin');
Route::get('signup', 'GuestController@signup')->name('signup');
Route::get('account', 'LoggedInController@account')->name('account');
Route::get('orders', 'LoggedInController@orders')->name('orders');
Route::get('account-detail', 'LoggedInController@accountDetail')->name('accountDetail');
Route::get('find-daycare', 'LoggedInController@finddaycare')->name('finddaycare');
Route::get('my-claimed-daycare', 'LoggedInController@my_claimed_daycare')->name('my_claimed_daycare');

Route::post('update_daycare_center', 'LoggedInController@update_daycare_center')->name('update_daycare_center');

Route::post('update/account', 'LoggedInController@updateAccount')->name('update.account');
Route::get('signout', function () {

    Auth::logout();

    Session::flash('flash_message', 'You have logged out  Successfully');
    Session::flash('alert-class', 'alert-success');

    return redirect('signin');

});

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('account/friends', 'LoggedInController@friends')->name('friends');
Route::get('account/upload', 'LoggedInController@upload')->name('upload');
Route::get('account/password', 'LoggedInController@password')->name('password');

Route::get('/success', 'OrderController@success')->name('success');

Route::post('update/profile', 'LoggedInController@update_profile')->name('update_profile');
Route::post('update/uploadPicture', 'LoggedInController@uploadPicture')->name('uploadPicture');


//===================== Front Routes =====================//

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');
Route::get('teacher', 'HomeController@teacher')->name('teacher');
Route::get('provider', 'HomeController@provider')->name('provider');
Route::get('contact', 'HomeController@contact')->name('contact');
Route::get('termsandconditionindividual', 'HomeController@termsandconditionindividual')->name('termsandconditionindividual');
Route::get('termsandconditionprovider', 'HomeController@termsandconditionprovider')->name('termsandconditionprovider');
Route::get('privacy', 'HomeController@privacy')->name('privacy');
Route::get('community', 'HomeController@community')->name('community');

Route::get('become-a-provider', 'HomeController@become_a_provider')->name('become-a-provider');
Route::get('become-a-teacher', 'HomeController@become_a_teacher')->name('become-a-teacher');

Route::get('joinnow', 'HomeController@joinnow')->name('joinnow');

Route::get('search', 'HomeController@search')->name('search');

Route::get('search-states', 'HomeController@searchStates')->name('search.states');
Route::get('search-cities', 'HomeController@searchCities')->name('search.cities');

Route::get('claimed_center', 'HomeController@claimed_center')->name('claimed_center');

Route::get('claimed_center_detail/{id?}', 'HomeController@claimed_center_detail')->name('claimed_center_detail');

Route::post('/check-email-existence', 'HomeController@checkEmailExistence')->name('checkEmailExistence');


// Teacher Dashboard
Route::get('teacher_dashboard', 'HomeController@teacher_dashboard')->name('teacher_dashboard');

Route::get('messages/{user?}', 'MessagesController@show')->name('chats.show');
Route::post('storeConversations', 'MessagesController@store')->name('chats.storeConversations');
Route::get('getConversations', 'MessagesController@getConversations')->name('chats.getConversations');

Route::get('my-pinned', 'HomeController@my_pinned')->name('my_pinned');

Route::get('add-post', 'HomeController@teacher_post')->name('add_post');
Route::get('job-board', 'HomeController@job_board')->name('job_board');
Route::get('apply-for-job/{id?}', 'HomeController@apply_for_job')->name('apply_for_job');
Route::get('become-an-angel/{jobid}/{creatorId}', 'HomeController@become_an_angel')->name('become_an_angel');
Route::get('check-angel/{jobid}/{creatorId}', 'HomeController@checkAngel')->name('checkAngel');
Route::get('update-profile', 'HomeController@update_profile')->name('update_profile');

Route::post('new-post', 'HomeController@teacher_create_new_post')->name('teacher_create_new_post');
Route::post('delete-post', 'HomeController@delete_post')->name('delete_post');
Route::post('share-post', 'HomeController@share_post')->name('share_post');


Route::post('add-pined-post', 'HomeController@add_pined_post')->name('add_pined_post');
Route::post('delete-pined-post', 'HomeController@delete_pined_post')->name('delete_pined_post');


Route::post('like_post', 'HomeController@like_post')->name('like_post');
Route::post('unlike_post', 'HomeController@unlike_post')->name('unlike_post');

Route::post('save_comment', 'HomeController@save_comment')->name('save_comment');

Route::get('get_last_post', 'HomeController@get_last_post')->name('get_last_post');
Route::get('bulletin_board', 'HomeController@bulletin')->name('bulletin_board');

//ProjectsPg

Route::get('projects', 'ProjectsPgController@index')->name('projects.index');
Route::get('projects/create', 'ProjectsPgController@create')->name('projects.create');
Route::post('projects/store', 'ProjectsPgController@store')->name('projects.store');
Route::get('projects/show/{id}', 'ProjectsPgController@show')->name('projects.show');
Route::get('projects/edit/{id}', 'ProjectsPgController@edit')->name('projects.edit');
Route::get('projects/delete/{id}', 'ProjectsPgController@destroy')->name('projects.delete');
Route::get('project/save/{id}', 'ProjectsPgController@save')->name('projects.save');
//For Payment
Route::post('order-search', 'LoggedInController@orderSearch')->name('order-search');
// Route::get('search-child-care','LoggedInController@search')->name('searchLogg');
// Provider Dashboard
Route::get('provider_dashboard', 'HomeController@provider_dashboard')->name('provider_dashboard');
Route::get('add-job', 'HomeController@add_job')->name('add_job');
Route::get('view-job', 'HomeController@view_job')->name('view_job');
Route::get('job-details', 'HomeController@getJobDetails')->name('get_job_details');
Route::get('edit-job/{id?}', 'HomeController@edit_job')->name('edit_job');
Route::get('delete_job/{id?}', 'HomeController@delete_job')->name('delete_job');
Route::post('teacher/connect/{id}', 'HomeController@connect')->name('connect.teacher');
Route::post('teacher/remove/{id}', 'HomeController@remove')->name('remove.teacher');
Route::get('angel-list', 'HomeController@angelList')->name('provider.angelList');
Route::get('delete-angel/{id}', 'HomeController@deleteAngel')->name('provider.deleteAngel');

Route::prefix('provider')->group(function () {
    Route::get('dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
    Route::get('daycare', [ProviderController::class, 'findDaycare'])->name('provider.findDaycare');
    Route::post('update-daycare-center', [ProviderController::class, 'updateDaycareCenter'])->name('provider.updateDaycareCenter');
    Route::get('claimed-centers', [ProviderController::class, 'claimedCenters'])->name('provider.claimedCenters');
});


Route::get('job-request', 'HomeController@job_request')->name('job_request');
Route::post('save_add_job', 'HomeController@save_add_job')->name('save_add_job');
Route::post('update_add_job', 'HomeController@update_add_job')->name('update_add_job');

Route::post('save_apply_for_job', 'HomeController@save_apply_for_job')->name('save_apply_for_job');


Route::get('view-job-request/{id?}', 'HomeController@view_job_request')->name('view_job_request');
Route::get('delete-job-request/{id?}', 'HomeController@delete_job_request')->name('delete_job_request');


Route::get('update-provider-profile', 'HomeController@update_provider_profile')->name('update_provider_profile');


Route::post('update_profile2', 'LoggedInController@update_profile2')->name('update_profile2');
Route::post('update_prov_profile2', 'LoggedInController@update_prov_profile2')->name('update_prov_profile2');

Route::get('video_delete', 'LoggedInController@video_delete')->name('video_delete');
Route::get('image_delete', 'LoggedInController@image_delete')->name('image_delete');
Route::get('banner_delete', 'LoggedInController@banner_delete')->name('banner_delete');




// Route::get('store','HomeController@store')->name('store');
Route::get('upcoming-classes', 'HomeController@upcoming_classes')->name('upcoming-classes');
Route::get('online-classes/{id?}', 'HomeController@online_classes')->name('classes');
Route::get('learn-to-play', 'HomeController@play')->name('play');
Route::get('shared-gallery', 'HomeController@sharedGallery')->name('sharedgallery');
Route::get('gallery-detail/{id}', 'HomeController@gallery_detail')->name('gallery-detail');
Route::post('commentSubmit', 'HomeController@commentSubmit')->name('commentSubmit');
Route::post('replySubmit', 'HomeController@replySubmit')->name('replySubmit');

Route::post('careerSubmit', 'HomeController@careerSubmit')->name('contactUsSubmit');
Route::post('newsletter-submit', 'HomeController@newsletterSubmit')->name('newsletterSubmit');
Route::post('update-content', 'HomeController@updateContent')->name('update-content');

Route::post('review_store', 'HomeController@store')->name('review_store');
//=================================================================//

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);


/*
Route::get('/test', function() {
    App::setlocale('arab');
    dd(App::getlocale());
    if(App::setlocale('arab')) {

    }
});
*/
/* Form Validation */


//===================== Shop Routes Below ========================//

Route::get('store', 'ProductController@shop')->name('shop');
Route::get('store-detail/{id}', 'ProductController@shopDetail')->name('shopDetail');
Route::get('category-detail/{id}', 'ProductController@categoryDetail')->name('categoryDetail');

Route::post('/cartAdd', 'ProductController@saveCart')->name('save_cart');
Route::any('/remove-cart/{id}', 'ProductController@removeCart')->name('remove_cart');
Route::post('/updateCart', 'ProductController@updateCart')->name('update_cart');
Route::get('/cart', 'ProductController@cart')->name('cart');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('invoice/{id}', 'LoggedInController@invoice')->name('invoice');
Route::get('/payment', 'OrderController@payment')->name('payment');
Route::get('/checkout', 'OrderController@checkout')->name('checkout');
Route::post('/place-order', 'OrderController@placeOrder')->name('order.place');
Route::post('/new-order', 'OrderController@newOrder')->name('new.place');
Route::post('shipping', 'ProductController@shipping')->name('shipping');

/*wishlist*/
Route::get('/wishlist', 'WishlistController@index')->name('customer.wishlist.list');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
Route::any('/wishlist/add/{id?}', 'WishlistController@addwishlist')->name('wishlist.add');
/*wishlist end*/

Route::post('/language-form', 'ProductController@language')->name('language');

//==============================================================//

Route::get('user-ip', 'HomeController@getusersysteminfo');

//===================== New Crud-Generators Routes Will Auto Display Below ========================//
route::get('status/delivered/{id}', 'admin\\productcontroller@updatestatusdelivered')->name('status.delivered');
route::get('status/cancelled/{id}', 'admin\\productcontroller@updatestatuscancelled')->name('status.cancelled');



Route::resource('admin/blog', 'Admin\\BlogController');
Route::resource('admin/category', 'Admin\\CategoryController');

Route::resource('admin/banner', 'Admin\\BannerController', ['names' => 'admin.banner']);
Route::get('admin/banner/{id}/delete', ['as' => 'banner.delete', 'uses' => 'Admin\\BannerController@destroy']);
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/attributes', 'Admin\\AttributesController');
Route::resource('admin/attributes-value', 'Admin\\AttributesValueController');
Route::post('admin/get-attributes', 'Admin\\AttributesValueController@getdata')->name('get-attributes');
Route::post('admin/pro-img-id-delet', 'Admin\\AttributesValueController@img_delete')->name('pro-img-id-delet');
Route::post('admin/delete-product-variant', 'Admin\\AttributesValueController@deleteProVariant')->name('delete.product.variant');
Route::resource('admin/testimonial', 'Admin\\TestimonialController');
Route::resource('admin/page', 'Admin\\PageController');
Route::resource('about/about', 'Admin, User\\AboutController');
Route::resource('news/news', 'Admin\\NewsController');

Route::resource('traning-videos', 'TraningVideosController');
Route::resource('upcomingclasses', 'UpcomingclassesController');
Route::resource('users2/users2', 'users2\Users2Controller');
Route::resource('users3/users3', 'users3\Users3Controller');
Route::resource('job_post/job_post', 'job_post\Job_postController');
Route::resource('request_job/request_job', 'request_job\Request_jobController');
Route::resource('post/post', 'post\PostController');
Route::resource('comment/comment', 'comment\CommentController');
Route::resource('like/like', 'like\LikeController');
Route::resource('pined_post/pined_post', 'pined_post\Pined_postController');
Route::resource('payment/payment', 'payment\PaymentController');

Route::resource('admin/shared-gallery/shared-gallery', 'SharedGallery\SharedGalleryController');

Route::resource('review/review', 'review\ReviewController');



Route::get('agree-to-sanbox-terms', function () {
    if (!\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->back();
    }

    $user = \App\User::find(\Illuminate\Support\Facades\Auth::id());
    $user->agreed_to_sandbox_terms = 1;
    $user->save();
    return redirect()->back();
})->name('agree_to_sandbox_terms');

Route::get('rules-of-conduct-individual', function () {
    return view('termsandconditionindividual');
})->name('rules-of-conduct-individual');



//=========================== Provider verification ===========================//


Route::get('verification/{id}', 'users3\Users3Controller@verification')->name('verification');

