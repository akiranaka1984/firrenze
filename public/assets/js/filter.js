// enrollment_table.blade.php のフィルタリング機能のみを追加
$(document).ready(function() {
  // 最初にレイアウトを修正
  fixLayout();
  
  // 並び替えボタンのイベント処理
  $('.sort-btn ul li').on('click', function() {
    var className = $(this).attr('class').split(' ')[0];
    
    // クリックした要素の状態に基づいて処理を変える
    if ($(this).hasClass('active')) {
      // すでにアクティブな場合
      if (className != 'all') {
        $(this).removeClass('active');
        
        // アクティブなフィルタがなくなった場合、「すべて」を表示
        if ($('.sort-btn ul li.active').length === 0) {
          $('.sort-btn ul li.all').addClass('active');
          
          // すべての要素を表示
          $('.article').show();
          // レイアウトを修復
          fixLayout();
        } else {
          // 他のアクティブなフィルタがある場合
          applyFilter();
        }
      }
    } else {
      // アクティブでない場合
      if (className == 'all') {
        // 「すべて」を選択した場合、他のフィルタをクリア
        $('.sort-btn ul li').removeClass('active');
        $(this).addClass('active');
        
        // すべての要素を表示
        $('.article').show();
        // レイアウトを修復
        fixLayout();
      } else {
        // 特定のカテゴリを選択した場合
        if ($('.sort-btn ul li.all').hasClass('active')) {
          $('.sort-btn ul li.all').removeClass('active');
        }
        $(this).addClass('active');
        applyFilter();
      }
    }
  });
  
  // フィルタリング関数
  function applyFilter() {
    // アクティブなフィルタを収集
    var selectElms = $('.sort-btn ul li.active');
    var filterClasses = [];
    
    selectElms.each(function() {
      var className = $(this).attr('class').split(' ')[0];
      filterClasses.push(className);
    });
    
    // 通常のDOM操作でフィルタリング
    $('.article').hide();
    
    // 少なくとも1つのクラスにマッチするアイテムを表示
    $('.article').each(function() {
      var $this = $(this);
      var matched = false;
      
      // 各フィルタクラスについてチェック
      for (var i = 0; i < filterClasses.length; i++) {
        if ($this.hasClass(filterClasses[i])) {
          matched = true;
          break;
        }
      }
      
      if (matched) {
        $this.show();
      }
    });
    
    // レイアウトを修復
    fixLayout();
  }
  
  // レイアウト修復関数
  function fixLayout() {
    // モバイルとデスクトップで異なるレイアウトを適用
    var isMobile = window.innerWidth < 767;
    
    // Muuriのスタイルを除去
    $('.grid').css({
      'height': 'auto',
      'position': 'relative'
    });
    
    // すべてのアイテムをリセット
    $('.article').css({
      'transform': 'none',
      'position': 'relative',
      'left': 'auto',
      'top': 'auto',
      'display': 'block',
      'float': 'left',
      'box-sizing': 'border-box'
    });
    
    // 表示されている要素のみを対象に
    var visibleItems = $('.article:visible');
    
    if (isMobile) {
      // モバイル用スタイル (2列)
      visibleItems.css({
        'width': '48%',
        'margin': '0 1% 15px 1%'
      });
    } else {
      // デスクトップ用スタイル (3列)
      visibleItems.css({
        'width': '31.333%',
        'margin': '0 1% 15px 1%'
      });
    }
    
    // クリアフィックスを追加（既存のものを削除して再追加）
    $('.clearfix-filter').remove();
    $('.article-wrap').after('<div class="clearfix-filter" style="clear:both;"></div>');
    
    // 親コンテナのスタイル修正
    $('.article-wrap').css({
      'display': 'block',
      'width': '100%',
      'position': 'relative',
      'overflow': 'hidden'
    });
  }
  
  // ウィンドウリサイズ時にもレイアウトを修正
  $(window).on('resize', function() {
    fixLayout();
  });
});