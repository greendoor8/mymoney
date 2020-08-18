<?php
declare(strict_types=1);

namespace OCA\MyMoney\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;


class PageController extends Controller {
	private $userId;
	protected $appName;


	public function __construct($appName, IRequest $request){
		parent::__construct($appName, $request);
		$this->appName = $appName;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		return new TemplateResponse($this->appName, 'main');
	}

}
