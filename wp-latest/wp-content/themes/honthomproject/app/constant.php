<?php
global $tp_options;
// var_dump(get_option('_s_theme_options')['sample_text_input']);
define('FB_APP_ID', 107233469945056);
define('FB_USER_ID', 100000400531879);

define('GIOI_THIEU', $tp_options['opt-introduce-constant'] ? $tp_options['opt-introduce-constant'] : 7);
define('TRAI_NGHIEM', $tp_options['opt-experience-constant'] ? $tp_options['opt-experience-constant'] : 7);
define('SU_KIEN', $tp_options['opt-event-constant'] ? $tp_options['opt-event-constant'] : 7);
define('CAU_HOI', $tp_options['opt-question-constant'] ? $tp_options['opt-question-constant'] : 7);
define('DOI_TAC', $tp_options['opt-partner-constant'] ? $tp_options['opt-partner-constant'] : 7);
define('TIN_TUC', $tp_options['opt-news-constant'] ? $tp_options['opt-news-constant'] : 7);
