<?php declare(strict_types=1);


/**
 * Nextcloud - Dashboard app
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2018, Maxence Lange <maxence@artificial-owl.com>
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Dashboard\Widgets;


use OCA\Dashboard\AppInfo\Application;
use OCP\Dashboard\IDashboardWidget;
use OCP\Dashboard\Model\IWidgetRequest;
use OCP\Dashboard\Model\IWidgetSettings;
use OCP\IL10N;

class ClockWidget implements IDashboardWidget {

	const WIDGET_ID = 'clock';


	/** @var IL10N */
	private $l10n;


	public function __construct(IL10N $l10n) {
		$this->l10n = $l10n;
	}


	/**
	 * @return string
	 */
	public function getId(): string {
		return self::WIDGET_ID;
	}


	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->l10n->t('Clock');
	}


	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->l10n->t('The time is now.');
	}


	/**
	 * @return array
	 */
	public function getTemplate(): array {
		return [
			'app'      => Application::APP_NAME,
			'icon'     => 'icon-clock',
			'css'      => 'widgets/clock',
			'js'       => 'widgets/clock',
			'content'  => 'widgets/clock',
			'function' => 'OCA.DashBoard.clock.init'
		];
	}


	/**
	 * @return array
	 */
	public function widgetSetup(): array {
		return [
			'size' => [
				'min'     => [
					'width'  => 2,
					'height' => 1
				],
				'default' => [
					'width'  => 2,
					'height' => 1
				],
				'max'     => [
					'width'  => 2,
					'height' => 1
				]
			],
			'jobs' => [
				[
					'delay'    => 1,
					'function' => 'OCA.DashBoard.clock.displayTime'
				]
			]
		];
	}


	/**
	 * @param IWidgetSettings $settings
	 */
	public function loadWidget(IWidgetSettings $settings) {
	}


	/**
	 * @param IWidgetRequest $request
	 */
	public function requestWidget(IWidgetRequest $request) {
	}


}