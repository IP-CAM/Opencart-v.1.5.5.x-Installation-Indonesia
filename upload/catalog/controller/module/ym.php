<?php
class ControllerModuleYm extends Controller {
	protected function index() {
		$this->language->load('module/ym');

		$this->data['heading_title'] = $this->language->get('heading_title');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/ym.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/ym.css');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/ym.css');
		}

		$this->data['accounts'] = array();

		$lines = explode('<br />', nl2br($this->config->get('ym_username')));

		foreach ($lines as $line) {
			$items = explode(',', $line);

			$this->data['accounts'][] = array(
				'title'		=> trim($items[0]),
				'username'	=> trim($items[1]),
				'icon'		=> trim($items[2])
			);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/ym.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/ym.tpl';
		} else {
			$this->template = 'default/template/module/ym.tpl';
		}

		$this->render();
	}
}
?>