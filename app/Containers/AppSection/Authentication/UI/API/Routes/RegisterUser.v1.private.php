<?php

/**
 * @apiGroup           Authentication
 *
 * @apiName            RegisterUser
 *
 * @api                {post} /v1/register Register User (create client)
 *
 * @apiDescription     Register users as (client).
 *
 * @apiVersion         1.0.0
 *
 * @apiPermission      none
 *
 * @apiHeader          {String} accept=application/json
 *
 * @apiBody            {String} email
 * @apiBody            {String} password min: 8
 *
 * at least one character of the following:
 *
 * upper case letter
 *
 * lower case letter
 *
 * number
 *
 * special character
 *
 * @apiBody           {String} [name] min:2|max:50
 * @apiBody           {String="male","female","unspecified"} [gender]
 *
 * @apiUse             UserSuccessSingleResponse
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterUserController::class);
