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

		$lines = explode('<br />', nl2br($this->config->get('ym_username')));
		$icon = $this->config->get('ym_icon');
		$this->data['content'] = '';

		foreach ($lines as $line) {
			$line = explode(',', $line);
			$title = trim($line[0]);
			$username = trim($line[1]);
			$icon = trim($line[2]);
			$this->data['content'] .= '<li><span class="ym-title">' . $title . '</span><a href="ymsgr:sendIM?' . trim($username) . '"><img src="http://opi.yahoo.com/online?u=' . trim($username) . '&m=g&t=' . $icon . '" /></a></li>';
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