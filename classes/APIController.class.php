<?php
/**
 * Created by irworks on 08.10.16.
 * © Copyright irworks, 2016
 * All rights reserved. Do not destribute.
 */

/**
 * Module: The basic API Controller.
 * File: PodelAPI/APIController.class.php
 * Depends: [NONE]
 */

namespace PodelAPI\Controller;
use PodelAPI\Controller\Requests\JodelAPIRequest;

require_once __DIR__ . '/CURL.class.php';
require_once __DIR__ . '/requests/JodelAPIRequest.class.php';
require_once __DIR__ . '/../models/BaseModel.object.php';

abstract class APIController
{
    protected function sendAPIRequest(JodelAPIRequest $request, $auth_token = '') : array {
        $curl = new CURL($request->getBaseURL() . $request->getEndpoint() . '?access_token=' . $auth_token, $request->getParameter(), $request->getMethod(), $request->getHTTPheader());
        return $curl->performRequest(true);
    }
}