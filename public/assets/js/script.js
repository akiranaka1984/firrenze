function fadeAnime() {
  $('.kv_open').addClass("open");
  //ふわっと動くきっかけのクラス名と動きのクラス名の設定
  $('.fadeUpTrigger').each(function () { //fadeInUpTriggerというクラス名が
    var elemPos = $(this).offset().top; //要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('smooth');
      // 画面内に入ったらfadeInというクラス名を追記
    } else {
      $(this).removeClass('smooth');
      // 画面外に出たらfadeInというクラス名を外す
    }
  });
} //
// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  fadeAnime(); /* アニメーション用の関数を呼ぶ*/
}); // ここまで画面が読み込まれたらすぐに動かしたい場合の記述

function fadeAnime2() {
  //ふわっと動くきっかけのクラス名と動きのクラス名の設定
  $('.fadeUpTrigger2').each(function () { //fadeInUpTriggerというクラス名が
    var elemPos = $(this).offset().top - 20; //要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('smooth');
      // 画面内に入ったらfadeInというクラス名を追記
    } else {
      $(this).removeClass('smooth');
      // 画面外に出たらfadeInというクラス名を外す
    }
  });
} //ここまでふわっと動くきっかけのクラス名と動きのクラス名の設定

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  fadeAnime2(); /* アニメーション用の関数を呼ぶ*/
}); // ここまで画面をスクロールをしたら動かしたい場合の記述

function fadeUp() {
  //ふわっと動くきっかけのクラス名と動きのクラス名の設定
  $('.fadeUpTrigger3').each(function () { //fadeInUpTriggerというクラス名が
    var elemPos = $(this).offset().top - 20; //要素より、50px上の
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('fadeUp');
      // 画面内に入ったらfadeInというクラス名を追記
    } else {
      $(this).removeClass('fadeUp');
      // 画面外に出たらfadeInというクラス名を外す
    }
  });
} //ここまでふわっと動くきっかけのクラス名と動きのクラス名の設定

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  fadeUp(); /* アニメーション用の関数を呼ぶ*/
}); // ここまで画面をスクロールをしたら動かしたい場合の記述


//ハンバーガーメニューのアニメーション
$(".hmb_menu").click(function () { //.btn_menuがクリックされたら
  $(this).toggleClass('active'); //.btn_menuに.activeクラスを付与する
  $('.con_menu').toggleClass('active');
});


//スクロールした際の動きを関数でまとめる
function PageTopAnime() {
  var scroll = $(window).scrollTop();
  if (scroll >= 400) { //上から200pxスクロールしたら
    $('#top_reserved_btn').removeClass('DownMove'); //#page-topについているDownMoveというクラス名を除く
    $('#top_reserved_btn').addClass('UpMove'); //#page-topについているUpMoveというクラス名を付与
  } else {
    if ($('#top_reserved_btn').hasClass('UpMove')) { //すでに#page-topにUpMoveというクラス名がついていたら
      $('#top_reserved_btn').removeClass('UpMove'); //UpMoveというクラス名を除き
      $('#top_reserved_btn').addClass('DownMove'); //DownMoveというクラス名を#page-topに付与
    }
  }
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  PageTopAnime(); /* スクロールした際の動きの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  PageTopAnime(); /* スクロールした際の動きの関数を呼ぶ*/
});


$(document).ready(function () {
  // 共通のSlick設定を関数で定義
  function initializeSlick(sliderSelector, settings) {
    // セレクタが存在する場合のみ初期化
    if ($(sliderSelector).length) {
      try {
        $(sliderSelector).slick(settings);
      } catch (e) {
        console.error("Slick初期化エラー:", e);
      }
    }
  }

  // KV アニメーション用の設定
  initializeSlick('.slider_kv', {
    fade: true,
    autoplay: true,
    autoplaySpeed: 3500,
    speed: 1000,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false
  });

  // スマホ用：スライダーをタッチしても止めずにスライドをさせたい場合
  $('.slider_kv').on('touchmove', function () {
    $(this).slick('slickPlay');
  });

  // モデルのスライド設定
  initializeSlick('#article-slider', {
    autoplay: true,
    infinite: true,
    autoplaySpeed: 3500,
    speed: 1000,
    slidesToShow: 3,
    slidesToScroll: 3,
    prevArrow: '<div class="slick-prev"></div>',
    nextArrow: '<div class="slick-next"></div>',
    dots: false,
    responsive: [{
      breakpoint: 769,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    }, {
      breakpoint: 431,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }]
  });

  // 別のスライド設定、異なるオートプレイスピードを持つ
  initializeSlick('#article-slider2', {
    autoplay: true,
    infinite: true,
    autoplaySpeed: 10000, // 異なるオートプレイスピード
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-prev"></div>',
    nextArrow: '<div class="slick-next"></div>',
    dots: false,
    responsive: [{
      breakpoint: 769,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }, {
      breakpoint: 431,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }]
  });

  // バナーのスライド設定
  initializeSlick('.banner_wrap', {
    autoplay: true,
    infinite: true,
    autoplaySpeed: 3500,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-prev2"></div>',
    nextArrow: '<div class="slick-next2"></div>',
    dots: false,
    responsive: [{
      breakpoint: 769,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }, {
      breakpoint: 431,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }]
  });

  // プロフィール写真のスライド設定
  initializeSlick('.plof_slider', {
    autoplay: false,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<div class="slick-prev"></div>',
    nextArrow: '<div class="slick-next"></div>',
    centerMode: true,
    variableWidth: true,
    dots: false,
  });
});


//検索アコーディオンをクリックした時の動作
$('.search_title').on('click', function () { //タイトル要素をクリックしたら
  var findElm = $(this).next(".box"); //直後のアコーディオンを行うエリアを取得し
  $(findElm).slideToggle(); //の上下動作

  if ($(this).hasClass('close')) { //タイトル要素にクラス名closeがあれば
    $(this).removeClass('close'); //クラス名を除去し
  } else { //それ以外は
    $(this).addClass('close'); //クラス名closeを付与
  }
});

//ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
$(window).on('load', function () {
  $('.accordion-area li:first-of-type section').addClass("open"); //accordion-areaのはじめのliにあるsectionにopenクラスを追加
  $(".open").each(function (index, element) { //openクラスを取得
    var Title = $(element).children('.search_title'); //openクラスの子要素のtitleクラスを取得
    $(Title).addClass('close'); //タイトルにクラス名closeを付与し
    var Box = $(element).children('.box'); //openクラスの子要素boxクラスを取得
    $(Box).slideDown(500); //アコーディオンを開く
  });
});

// グローバル変数としてグリッドを宣言
let grid;
let isMobile = window.innerWidth < 767;

// Muuriグリッド初期化関数
function initMuuriGrid() {
  try {
    // すでに初期化されている場合は破棄
    if (grid) {
      grid.destroy();
    }
    
    // Muuriグリッドが適用される要素があるか確認
    if (!document.querySelector('.grid')) {
      return null;
    }
    
    // 画面幅に応じて列数を決定
    const columns = (window.innerWidth < 767) ? 2 : 3;
    
    // モバイルでは処理を少し遅延させてメインスレッドを邪魔しないようにする
    if (isMobile) {
      // グリッドアイテムに初期表示のためのスタイルを適用
      $('.model-item').css({
        'opacity': '1',
        'transform': 'scale(1)'
      });
    }
    
    // Muuriグリッドを初期化
    grid = new Muuri('.grid', {
      items: '.item',
      showDuration: 600,
      showEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
      hideDuration: 600,
      hideEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
      visibleStyles: {
        opacity: '1',
        transform: 'scale(1)'
      },
      hiddenStyles: {
        opacity: '0',
        transform: 'scale(0.5)'
      },
      sortData: {
        rank: function (item, element) {
          return parseInt(element.dataset.rank, 10) || 0;
        }
      },
      layout: {
        fillGaps: false,
        horizontal: false,
        alignRight: false,
        alignBottom: false,
        rounding: false,
        columns: columns
      }
    });
    
    // 画像が読み込まれた後にレイアウトを再調整
    if (typeof imagesLoaded === 'function') {
      imagesLoaded('.grid', function() {
        if (grid) {
          grid.refreshItems().layout();
        }
      });
    }
    
    return grid;
  } catch (error) {
    console.error("Muuri初期化エラー:", error);
    
    // エラー発生時に一般的なレイアウトを適用
    $('.model-item').css({
      'opacity': '1',
      'transform': 'none',
      'position': 'relative'
    });
    
    return null;
  }
}

$(document).ready(function() {
  try {
    // モバイルかどうかを判定
    isMobile = window.innerWidth < 767;
    
    // グリッドを初期化（モバイルの場合は少し遅延させる）
    if (document.querySelector('.grid')) {
      if (isMobile) {
        // モバイルでは少し遅延させて初期化
        setTimeout(function() {
          grid = initMuuriGrid();
        }, 100);
      } else {
        grid = initMuuriGrid();
      }
    }
    
    // フィルタリングボタンのクリックイベント
    $('.sort-btn ul li').on('click', function() {
      if (!grid) return; // グリッドが初期化されていない場合は処理しない
      
      const className = $(this).attr("class").split(' ')[0];
      
      if ($(this).hasClass("active")) {
        // すでにアクティブな場合
        if (className !== "all") {
          $(this).removeClass("active");
          const activeItems = $(".sort-btn ul li.active");
          if (activeItems.length === 0) {
            $(".sort-btn ul li.all").addClass("active");
            grid.filter(''); // すべて表示
          } else {
            applyFilter();
          }
        }
      } else {
        // アクティブでない場合
        if (className === "all") {
          $(".sort-btn ul li").removeClass("active");
          $(this).addClass("active");
          grid.filter(''); // すべて表示
        } else {
          if ($(".sort-btn ul li.all").hasClass("active")) {
            $(".sort-btn ul li.all").removeClass("active");
          }
          $(this).addClass("active");
          applyFilter();
        }
      }
    });
    
    // フィルター適用関数
    function applyFilter() {
      if (!grid) return;
      
      const activeItems = $(".sort-btn ul li.active");
      const filterClasses = [];
      
      activeItems.each(function() {
        const className = $(this).attr("class").split(' ')[0];
        filterClasses.push(className);
      });
      
      if (filterClasses.length > 0) {
        // MuuriのフィルターAPIを使用
        grid.filter(function(item) {
          const element = item.getElement();
          // いずれかのフィルタークラスがあればtrue
          return filterClasses.some(className => 
            element.classList.contains(className)
          );
        });
      } else {
        grid.filter(''); // フィルターなしの場合はすべて表示
      }
    }
    
    // 画面サイズ変更時のレイアウト調整
    let lastWidth = window.innerWidth;
    const reloadThreshold = 767;
    
    $(window).on('resize', function() {
      const currentWidth = window.innerWidth;
      
      // ブレークポイント付近でページ再読み込み
      if ((lastWidth < reloadThreshold && currentWidth >= reloadThreshold) || 
          (lastWidth >= reloadThreshold && currentWidth < reloadThreshold)) {
        window.location.reload();
      } else if (grid) {
        // それ以外の場合は列数を更新してレイアウト調整
        const columns = (currentWidth < 767) ? 2 : 3;
        try {
          grid.updateSettings({
            layout: {
              columns: columns
            }
          });
          grid.layout();
        } catch (e) {
          console.error("レイアウト更新エラー:", e);
        }
      }
      
      lastWidth = currentWidth;
    });
    
    // PCの場合、CSSを強制的に適用（Muuriと併用）
    if (window.innerWidth >= 767) {
      $('.model-item').css({
        'width': 'calc(33.3333% - 10px)',
        'margin': '0 5px 10px',
        'box-sizing': 'border-box'
      });
    }
  } catch (error) {
    console.error("初期化エラー:", error);
    
    // エラー時はPCの場合、強制的に3カラムレイアウトを適用
    if (window.innerWidth >= 767) {
      $('.model-item').css({
        'width': 'calc(33.3333% - 10px)',
        'position': 'relative',
        'left': 'auto',
        'top': 'auto',
        'transform': 'none',
        'float': 'left',
        'margin': '0 5px 10px',
        'box-sizing': 'border-box'
      });
    } else {
      // モバイルの場合は2カラムレイアウトを適用
      $('.model-item').css({
        'width': '48%',
        'position': 'relative',
        'left': 'auto',
        'top': 'auto',
        'transform': 'none',
        'float': 'left',
        'margin': '0 1% 10px',
        'box-sizing': 'border-box',
        'opacity': '1'
      });
    }
  }
});

// 画像の遅延読み込み設定
function setupLazyLoading() {
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const lazyImage = entry.target;
          if (lazyImage.dataset.src) {
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.removeAttribute('data-src');
          }
          imageObserver.unobserve(lazyImage);
        }
      });
    });
    
    // 画像要素にdata-src属性がある場合のみ処理
    document.querySelectorAll('img[data-src]').forEach(img => {
      imageObserver.observe(img);
    });
  }
}

//採用ページタブ切り替え
//任意のタブにURLからリンクするための設定
function GethashID(hashIDName) {
  if (hashIDName) {
    //タブ設定
    $('.tab li').find('a').each(function () { //タブ内のaタグ全てを取得
      var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得
      if (idName == hashIDName) { //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
        var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）取得
        $('.tab li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
        $(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
        //表示させるエリア設定
        $(".area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
        $(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加
      }
    });
  }
}

//タブをクリックしたら
$('.tab a').on('click', function () {
  var idName = $(this).attr('href'); //タブ内のリンク名を取得
  GethashID(idName); //設定したタブの読み込みと
  return false; //aタグを無効にする
});


// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on('load', function () {
  $('.tab li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
  $('.area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
  var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
  GethashID(hashName); //設定したタブの読み込み
  
  // 画像の遅延読み込みを設定
  setupLazyLoading();
});


document.addEventListener('DOMContentLoaded', function() {
  // 電話番号入力制御
  var inputs = document.querySelectorAll('.tel');
  inputs.forEach(function(input) {
      input.addEventListener('input', function() {
          this.value = this.value.replace(/[^0-9]/g, '');
      });
  });

  // intro 要素の高さを揃える - DOMContentLoadedだと早すぎる場合があるので
  // ブラウザのレンダリングが安定した後に実行する
  setTimeout(function() {
    try {
      const intros = document.querySelectorAll('.intro');
      if (intros.length > 0) {
        let maxHeight = 0;
        
        // 各 intro 要素の高さを測定し、最大値を取得
        intros.forEach(intro => {
          const height = intro.offsetHeight;
          if (height > 0) maxHeight = Math.max(maxHeight, height);
        });
        
        // 最大の高さに余裕を持たせて他の intro 要素に適用
        if (maxHeight > 0) {
          const extraSpace = 10; // 余裕の高さ（ピクセル単位）
          intros.forEach(intro => {
            intro.style.height = (maxHeight + extraSpace) + 'px';
          });
        }
      }
    } catch (e) {
      console.error("intro高さ設定エラー:", e);
    }
  }, 300);

  // モバイルデバイス判定関数
  function isMobileDevice() {
      return window.innerWidth < 767;
  }

  if (!isMobileDevice()) {  // PCの場合の処理
      if (document.querySelector('.load-more-trigger')) {
          const observer = new IntersectionObserver((entries) => {
              if (entries[0].isIntersecting) {
                  if (typeof loadMoreCompanions === 'function') {
                      loadMoreCompanions();
                  }
              }
          });
          observer.observe(document.querySelector('.load-more-trigger'));
      }
  }
});

// エラーメッセージの表示用関数
function simpleMessage(type, message) {
  const alertClass = type === 'error' ? 'alert-danger' : 'alert-success';
  const alertDiv = document.createElement('div');
  alertDiv.className = alertClass;
  alertDiv.textContent = message;
  
  // メッセージを表示する場所の取得（例：bodyの最初の子要素の前）
  const container = document.querySelector('main');
  if (container) {
    container.insertBefore(alertDiv, container.firstChild);
    
    // 5秒後に自動的に消える
    setTimeout(() => {
      alertDiv.remove();
    }, 5000);
  }
}