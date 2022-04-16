<?php

//if accessed directly exit
if(!defined('ABSPATH')) exit;

class EdgeSkin extends NoizzyEdgeSkinAbstract {
    /**
     * Skin constructor. Hooks to noizzy_edge_admin_scripts_init and noizzy_edge_enqueue_admin_styles
     */
    public function __construct() {
        $this->skinName = 'edge';

        //hook to
        add_action('noizzy_edge_admin_scripts_init', array($this, 'registerStyles'));
        add_action('noizzy_edge_admin_scripts_init', array($this, 'registerScripts'));

        add_action('noizzy_edge_enqueue_admin_styles', array($this, 'enqueueStyles'));
        add_action('noizzy_edge_enqueue_admin_scripts', array($this, 'enqueueScripts'));

        add_action('noizzy_edge_enqueue_meta_box_styles', array($this, 'enqueueStyles'));
        add_action('noizzy_edge_enqueue_meta_box_scripts', array($this, 'enqueueScripts'));

		add_action('before_wp_tiny_mce', array($this, 'setShortcodeJSParams'));
    }

    /**
     * Method that registers skin scripts
     */
	public function registerScripts() {
		
		$this->scripts['edge-ui-admin-skin'] = array(
			'path'       => 'assets/js/edge-ui.js',
			'dependency' => array()
		);
		
		foreach ( $this->scripts as $scriptHandle => $script ) {
			noizzy_edge_register_skin_script( $scriptHandle, $script['path'], $script['dependency'] );
		}
	}

    /**
     * Method that registers skin styles
     */
    public function registerStyles() {
	    $this->styles['edge-bootstrap'] = 'assets/css/edge-bootstrap.css';
        $this->styles['edge-page-admin'] = 'assets/css/edge-page.css';
        $this->styles['edge-options-admin'] = 'assets/css/edge-options.css';
        $this->styles['edge-meta-boxes-admin'] = 'assets/css/edge-meta-boxes.css';
        $this->styles['edge-ui-admin'] = 'assets/css/edge-ui/edge-ui.css';
        $this->styles['edge-forms-admin'] = 'assets/css/edge-forms.css';
        $this->styles['edge-import'] = 'assets/css/edge-import.css';

        foreach ($this->styles as $styleHandle => $stylePath) {
            noizzy_edge_register_skin_style($styleHandle, $stylePath);
        }
    }

    /**
     * Method that renders options page
     *
     * @see EdgeSkin::getHeader()
     * @see EdgeSkin::getPageNav()
     * @see EdgeSkin::getPageContent()
     */
    public function renderOptions() {
        global $noizzy_edge_Framework;
        $tab    = noizzy_edge_get_admin_tab();
        $active_page = $noizzy_edge_Framework->edgeOptions->getAdminPageFromSlug($tab);
        if ($active_page == null) return;
        ?>
        <div class="edge-options-page edge-page">
            <?php $this->getHeader($active_page); ?>
            <div class="edge-page-content-wrapper">
                <div class="edge-page-content">
                    <div class="edge-page-navigation edge-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav($tab); ?>
                        <?php $this->getPageContent($active_page); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

    /**
     * Method that renders header of options page.
     * @param bool $show_save_btn whether to show save button. Should be hidden on import page
     *
     * @see NoizzyEdgeSkinAbstract::loadTemplatePart()
     */
    public function getHeader($activePage = '', $show_save_btn = true) {
        $this->loadTemplatePart('header', array('active_page' => $activePage, 'show_save_btn' => $show_save_btn));
    }

    /**
     * Method that loads page navigation
     * @param string $tab current tab
     * @param bool $is_import_page if is import page highlighted that tab
     *
     * @see NoizzyEdgeSkinAbstract::loadTemplatePart()
     */
    public function getPageNav($tab, $is_import_page = false, $is_backup_options_page = false) {
        $this->loadTemplatePart('navigation', array(
            'tab' => $tab,
            'is_import_page' => $is_import_page,
			'is_backup_options_page' => $is_backup_options_page
        ));
    }

    /**
     * Method that loads current page content
     *
     * @param NoizzyEdgeAdminPage $page current page to load
     * @see NoizzyEdgeSkinAbstract::loadTemplatePart()
     */
    public function getPageContent($page) {
        $this->loadTemplatePart('content', array('page' => $page));
    }

    /**
     * Method that loads content for import page
     */
    public function getImportContent() {
        $this->loadTemplatePart('content-import');
    }

	/**
	 * Method that loads content for backup page
	 */
	public function getBackupOptionsContent() {
		$this->loadTemplatePart('backup-options');
	}

	/**
	 * Method that loads anchors and save button template part
	 *
	 * @param NoizzyEdgeAdminPage $page current page to load
	 * @see NoizzyEdgeSkinAbstract::loadTemplatePart()
	 */
    public function getAnchors($page) {
        $this->loadTemplatePart('anchors', array('page' => $page));

    }
	
	/**
	 * Method that renders import page
	 *
	 *  @see EdgeSkin::getHeader()
	 *  @see EdgeSkin::getPageNav()
	 *  @see EdgeSkin::getImportContent()
	 */
    public function renderImport() { ?>
        <div class="edge-options-page edge-page">
            <?php $this->getHeader('', false); ?>
            <div class="edge-page-content-wrapper">
                <div class="edge-page-content">
                    <div class="edge-page-navigation edge-tabs-wrapper vertical left clearfix">
                        <?php $this->getPageNav('tabimport', true); ?>
                        <?php $this->getImportContent(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }

	/**
	 * Method that renders backup options page
	 *
	 * @see EdgeSkin::getHeader()
	 * * @see EdgeSkin::getPageNav()
	 * * @see EdgeSkin::getImportContent()
	 */
	public function renderBackupOptions() { ?>
		<div class="edge-options-page edge-page">
			<?php $this->getHeader('',false); ?>
			<div class="edge-page-content-wrapper">
				<div class="edge-page-content">
					<div class="edge-page-navigation edge-tabs-wrapper vertical left clearfix">
						<?php $this->getPageNav('backup_options', false, true); ?>
						<?php $this->getBackupOptionsContent(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php }

}
?>