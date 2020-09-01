<?php

// Route::get('/addUser', 'Admin\\DashboardController@addUser')->name('addUser');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

	// Route dashboard
		Route::get('/dashboard', function() {
			return view('pages.dashboard');
		});
		Route::get('/', 'Admin\\DashboardController@index')->name('dashboard');

	// Route locations
		Route::get('/locations', 'Admin\\LocationController@index')->name('locations');
		Route::post('/locations/store', 'Admin\\LocationController@store')->name('locations.store');
		Route::post('/locations/update', 'Admin\\LocationController@update')->name('locations.update');
		Route::post('/locations/delete', 'Admin\\LocationController@destroy')->name('locations.delete');

	// Route Tracks
		Route::get('/tracks', 'Admin\\TracksController@index')->name('tracks');
		Route::post('/tracks/store', 'Admin\\TracksController@store')->name('tracks.store');
		Route::post('/tracks/update', 'Admin\\TracksController@update')->name('tracks.update');
		Route::post('/tracks/delete', 'Admin\\TracksController@destroy')->name('tracks.delete');
		Route::post('/tracks/active', 'Admin\\TracksController@active')->name('tracks.active');
		Route::post('/tracks/deactive', 'Admin\\TracksController@deactive')->name('tracks.deactive');

	// Route Times
		Route::get('/times', 'Admin\\TimesController@index')->name('times');
		Route::post('/times/store', 'Admin\\TimesController@store')->name('times.store');
		Route::post('/times/edit', 'Admin\\TimesController@update')->name('times.edit');
		Route::post('/times/delete', 'Admin\\TimesController@destroy')->name('times.delete');
		Route::post('/time/active', 'Admin\\TimesController@active')->name('times.active');
		Route::post('/time/deactive', 'Admin\\TimesController@deactive')->name('times.deactive');

	// Route Levels
		Route::get('/levels', 'Admin\\LevelsController@index')->name('levels');
		Route::post('/levels/store', 'Admin\\LevelsController@store')->name('levels.store');
		Route::post('/levels/edit', 'Admin\\LevelsController@update')->name('levels.edit');
		Route::post('/levels/delete', 'Admin\\LevelsController@destroy')->name('levels.delete');
		Route::post('/levels/active', 'Admin\\LevelsController@active')->name('levels.active');
		Route::post('/levels/deactive', 'Admin\\LevelsController@deactive')->name('levels.deactive');

	// Route Batches
		Route::get('/batches', 'Admin\\BatchesController@index')->name('batches');
		Route::post('/batches/store', 'Admin\\BatchesController@store')->name('batches.store');
		Route::post('/batches/edit', 'Admin\\BatchesController@update')->name('batches.edit');
		Route::post('/batches/delete', 'Admin\\BatchesController@destroy')->name('batches.delete');
		Route::post('/batches/current', 'Admin\\BatchesController@current')->name('batches.current');
		Route::post('/batches/exam', 'Admin\\BatchesController@exam')->name('batches.exam');
		Route::post('/batches/active', 'Admin\\BatchesController@active')->name('batches.active');
		Route::post('/batches/deactive', 'Admin\\BatchesController@deactive')->name('batches.deactive');

	// Route Groups
		Route::get('/groups', 'Admin\\GroupsController@index')->name('groups');
		Route::post('/groups/store', 'Admin\\GroupsController@store')->name('groups.store');
		Route::post('/groups/edit', 'Admin\\GroupsController@update')->name('groups.edit');
		Route::post('/groups/delete', 'Admin\\GroupsController@destroy')->name('groups.delete');
		Route::post('/groups/addTeacher', 'Admin\\GroupsController@addTeacher')->name('groups.addTeacher');
		Route::post('/groups/removeTeacher', 'Admin\\GroupsController@removeTeacher')->name('groups.removeTeacher');

	// Route Students
		Route::get('/students', 'Admin\\StudentsController@index')->name('students');
		Route::post('/students/store', 'Admin\\StudentsController@store')->name('student.store');
		Route::post('/students/{id}/edit', 'Admin\\StudentsController@update')->name('student.edit');
		Route::post('/students/{id}/delete', 'Admin\\StudentsController@destroy')->name('student.delete');

	// Route Payment Students
		Route::get('/students/payment/{id}', 'Admin\\StudPayController@index')->name('paystud');
		Route::post('/students/payment/store', 'Admin\\StudPayController@store')->name('paystud.store');
		Route::post('/students/payment/{id}/edit', 'Admin\\StudPayController@update')->name('paystud.edit');
		Route::post('/students/payment/{id}/delete', 'Admin\\StudPayController@destroy')->name('paystud.delete');
	
	// Route Refunds Payment Students
		Route::get('/students/payment/{id}/refunds', 'Admin\PayRefundController@index')->name('payrefund');
		Route::post('/students/payment/refunds/store', 'Admin\PayRefundController@store')->name('payrefund.store');
		Route::post('/students/payment/{id}/refunds/edit', 'Admin\PayRefundController@update')->name('payrefund.edit');
		Route::post('/students/payment/{id}/refunds/delete', 'Admin\PayRefundController@destroy')->name('payrefund.delete');
	// Route Payment Types
		Route::get('/paytypes', 'Admin\\PaytypesController@index')->name('paytypes');
		Route::post('/paytypes/store', 'Admin\\PaytypesController@store')->name('paytypes.store');
		Route::post('/paytypes/edit', 'Admin\\PaytypesController@update')->name('paytypes.edit');
		Route::post('/paytypes/delete', 'Admin\\PaytypesController@destroy')->name('paytypes.delete');
		Route::get('/paytypes/{id}/active', 'Admin\\PaytypesController@active')->name('paytypes.active');
		Route::get('/paytypes/{id}/deactive', 'Admin\\PaytypesController@deactive')->name('paytypes.deactive');

	// Route Department
		Route::get('/departments', 'Admin\\DepartmentController@index')->name('departments');
		Route::post('/departments/store', 'Admin\\DepartmentController@store')->name('departments.store');
		Route::post('/departments/edit', 'Admin\\DepartmentController@update')->name('departments.edit');
		Route::post('/departments/delete', 'Admin\\DepartmentController@destroy')->name('departments.delete');
		Route::post('addmanager/{id}', 'Admin\\DepartmentController@addmanager')->name('addmanager');

	// Route Jobs
		Route::get('/jobs', 'Admin\\JobsController@index')->name('jobs');
		Route::post('/jobs/store', 'Admin\\JobsController@store')->name('jobs.store');
		Route::post('/jobs/edit', 'Admin\\JobsController@update')->name('jobs.edit');
		Route::post('/jobs/delete', 'Admin\\JobsController@destroy')->name('jobs.delete');

	// Route Employees
		Route::get('/employees', 'Admin\\EmployeesControllors@index')->name('employees');
		Route::post('/employees/store', 'Admin\\EmployeesControllors@store')->name('employees.store');
		Route::post('/employees/edit', 'Admin\\EmployeesControllors@update')->name('employees.edit');
		Route::post('/employees/delete', 'Admin\\EmployeesControllors@destroy')->name('employees.delete');
		Route::post('/employees/active', 'Admin\\EmployeesControllors@active')->name('employees.active');
		Route::post('/employees/deactive', 'Admin\\EmployeesControllors@deactive')->name('employees.deactive');
		Route::get('/getJobs', 'Admin\\EmployeesControllors@getJobs')->name('getJobs');
		Route::get('/editgetJobs', 'Admin\\EmployeesControllors@editgetJobs')->name('editgetJobs');

	// Route Vacations
		Route::get('/vacations', 'Admin\\VacationController@index')->name('vacations');
		Route::post('/vacation/store', 'Admin\\VacationController@store')->name('vacat.store');
		Route::post('/vacation/{id}/edit', 'Admin\\VacationController@update')->name('vacat.edit');
		Route::post('/vacation/{id}/delete', 'Admin\\VacationController@delete')->name('vacat.delete');
		Route::get('/acceptVacation/{id}', 'Admin\\VacationController@acceptVacation')->name('acceptVacation');
		Route::get('/rejectVacation/{id}', 'Admin\\VacationController@rejectVacation')->name('rejectVacation');

	// Route Survey
		Route::get('/survey', 'Admin\\SurveyController@index')->name('survey');
		Route::post('/survey/store', 'Admin\\SurveyController@store')->name('survey.store');
		Route::post('/survey/{id}/edit', 'Admin\\SurveyController@update')->name('survey.edit');
		Route::post('/survey/{id}/delete', 'Admin\\SurveyController@destroy')->name('survey.delete');

	// Route Leads
		Route::get('/leads', 'Admin\\LeadController@index')->name('lead');
		Route::post('/leads/store', 'Admin\\LeadController@store')->name('lead.store');
		Route::post('/leads/{id}/edit', 'Admin\\LeadController@update')->name('lead.edit');
		Route::post('/leads/{id}/delete', 'Admin\\LeadController@destroy')->name('lead.delete');

	// Route Profile
		Route::get('profiles', 'Admin\\ProfilesController@index')->name('profiles');
		Route::post('profiles/store', 'Admin\\ProfilesController@store');
		Route::post('/profiles/vacationstore', 'Admin\\ProfilesController@vacationstore')->name('vacationstore');

	// Route Expenses
		Route::get('expenses', 'Admin\\ExpenseController@index')->name('expense');
		Route::post('expenses/store', 'Admin\\ExpenseController@store')->name('expense.store');
		Route::post('expenses/{id}/edit', 'Admin\\ExpenseController@update')->name('expense.edit');
		Route::post('expenses/{id}/delete', 'Admin\\ExpenseController@destroy')->name('expense.delete');
		Route::get('/expenses/{id}/active', 'Admin\\ExpenseController@active')->name('expense.active');
		Route::get('/expenses/{id}/deactive', 'Admin\\ExpenseController@deactive')->name('expense.deactive');

	// Route Expenses Type
		Route::get('expenses_type', 'Admin\\ExptypeController@index')->name('exptype');
		Route::post('expenses_type/store', 'Admin\\ExptypeController@store')->name('exptype.store');
		Route::post('expenses_type/{id}/edit', 'Admin\\ExptypeController@update')->name('exptype.edit');
		Route::post('expenses_type/{id}/delete', 'Admin\\ExptypeController@destroy')->name('exptype.delete');

	// Route Exam
		Route::get('exams', 'Admin\\ExamMang\\ExamController@index')->name('exam');
		Route::post('exams/store', 'Admin\\ExamMang\\ExamController@store')->name('exam.store');
		Route::post('exams/{id}/edit', 'Admin\\ExamMang\\ExamController@update')->name('exam.edit');
		Route::post('exams/{id}/delete', 'Admin\\ExamMang\\ExamController@destroy')->name('exam.delete');
		Route::get('getLevel', 'Admin\\ExamMang\\ExamController@getLevel')->name('getLevel');

	// Route Question
		Route::get('questions', 'Admin\\ExamMang\\QuestionController@index')->name('question');
		Route::post('questions/store', 'Admin\\ExamMang\\QuestionController@store')->name('question.store');
		Route::post('questions/{id}/edit', 'Admin\\ExamMang\\QuestionController@update')->name('question.edit');
		Route::post('questions/{id}/delete', 'Admin\\ExamMang\\QuestionController@destroy')->name('question.delete');

	// Route Instructions
		Route::get('instructions', 'Admin\\ExamMang\\InstructionController@index')->name('instruction');
		Route::post('instructions/store', 'Admin\\ExamMang\\InstructionController@store')->name('instruction.store');
		Route::post('instructions/{id}/edit', 'Admin\\ExamMang\\InstructionController@update')->name('instruction.edit');
		Route::post('instructions/{id}/delete', 'Admin\\ExamMang\\InstructionController@destroy')->name('instruction.delete');

	// Route Absent
		Route::resource('absent', 'Admin\\AbsentController');
	
	// Route Recommend
		Route::resource('recommends', 'Admin\RecommendController');

	// Route Payment
		Route::get('payments', 'Admin\\PaymentController@index')->name('payment');
	
	// Route Payroll
		Route::resource('payroll', 'Admin\PayrollController');
});