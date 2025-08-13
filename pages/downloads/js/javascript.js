if (typeof jQuery === 'undefined') {
    throw new Error('BEL-CMS requires jQuery')
}
    $(document).ready(function() {
      function updateCount() {
        const visibleCount = $('.belcms_category:visible').length;
        $('#belcms_category_count').text('Nombre de catégories : ' + visibleCount);
      }

      $('#belcms_search').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('.belcms_category').each(function() {
          const title = $(this).find('h4').text().toLowerCase();
          $(this).toggle(title.includes(value));
        });
        updateCount();
      });

      updateCount();
    });