jQuery(function ($) {

  $(document).on('tinymce-editor-init', initialize_tinyMCE);

  let editor_initialized = 0;

  $(document).on('mouseover', '.accordion-section-title', function () {

    if (!editor_initialized) {

      let settingsObj = {
                          tinymce: {
                            wpautop: true,
                            plugins : 'charmap colorpicker compat3x directionality fullscreen hr image lists media paste tabfocus textcolor wordpress wpautoresize wpdialogs wpeditimage wpemoji wpgallery wplink wptextpattern wpview',
                            toolbar1: 'bold italic underline strikethrough | bullist numlist | blockquote hr wp_more | alignleft aligncenter alignright | link unlink | fullscreen | wp_adv',
                            toolbar2: 'formatselect alignjustify forecolor | pastetext removeformat charmap | outdent indent | undo redo | wp_help'
                          },
                          quicktags: true,
                          mediaButtons: true,
                          textarea_name: 'hero-description'
                        };

      wp.editor.initialize(
        'hero-description',
        settingsObj
      );
      
      settingsObj.textarea_name = 'footer-1';

      wp.editor.initialize(
        'footer-1',
        settingsObj       
      );

      settingsObj.textarea_name = 'footer-2';
      
      wp.editor.initialize(
        'footer-2',
        settingsObj       
      );

      settingsObj.textarea_name = 'footer-3';
      
      wp.editor.initialize(
        'footer-3',
        settingsObj       
      );
      
      editor_initialized = 1;
    }
    
  });

  function initialize_tinyMCE(event, editor) {

    editor.on('change', function () {
      tinyMCE.triggerSave();
      $("#".concat(editor.id)).trigger('change');
    });

  }
  
  function init() {
    $(document).on('tinymce-editor-init', initialize_tinyMCE);
  }
  
  $(document).on('ready', init);
  
});
