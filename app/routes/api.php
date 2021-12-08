<?php

/**
 * API endpoints for handling basic student CRUD operations.
 *
 * Requirements:
 *
 * 1. A student_number, first_name, last_name and classroom_id are required
 *    to create a student.
 * 2. When updating a student record, only the first_name, last_name and
 *    classroom_id may be updated. Each of these fields is optional.
 *    The student_number should be immutable after a student is created.
 * 3. The student_number must be alphanumeric and unique for each student.
 * 4. The classroom_id must represent a valid ID from the classrooms table.
 * 5. When fetching data for an individual student (e.g. GET /students/123),
 *    the response payload should include a nested object with information
 *    about the student's classroom.
 * 6. When processing a student deletion request, the student should be
 *    soft-deleted and not actually removed from the database.
 * 7. Each endpoint should return a JSON response payload representing the
 *    student record being created/read/updated/deleted.
 */
Route::apiResource('students', 'StudentController');

/**
 * An API endpoint which will retrieve a list of students matching
 * certain search criteria.
 *
 * Requirements:
 *
 * 1. Filter students by first_name (if first_name passed in the HTTP request).
 * 2. Filter students by last_name (if last_name passed in the HTTP request).
 * 3. If a classroom_id is passed, return only students for that classroom.
 * 4. If a school_id is passed, return only students for that school.
 * 5. In the JSON response payload, include the full_name for each student
 *    by combining the student's first and last name.
 */
Route::get('students/search', 'StudentSearchController@index');
