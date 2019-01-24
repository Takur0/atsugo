$(function () {
  searchWord = function(){
    var searchResult,
        searchText = $('#search-user').val(), // 検索ボックスに入力された値
        targetText,
        hitNum,
        AddedUsers = [];

        $('.added-member').each(function(){
          AddedUsers.push($(this).text());
        });

    // 検索結果を格納するための配列を用意
    searchResult = [];

    // 検索結果エリアの表示を空にする
    $('#search-result__list').empty();
    $('.search-result__hit-num').empty();

    // 検索ボックスに値が入ってる場合
    if (searchText != '') {
      $('table tbody tr .user-screen_name').each(function() {
        targetText = $(this).text();
        // $(this).style.color = white;
        console.log(searchText+':'+targetText);
        console.log(AddedUsers);
        var existUserInDB = (targetText.indexOf(searchText) != -1);
        var notExistUserInAddedUsers = (AddedUsers.indexOf(targetText) == -1);
        // 検索対象となるリストに入力された文字列が存在するかどうかを判断
        if (existUserInDB && notExistUserInAddedUsers) {
          // 存在する場合はそのリストのテキストを用意した配列に格納
          searchResult.push(targetText);
        }
      });

      // 検索結果をページに出力
      for (var i = 0; i < searchResult.length; i ++) {
        $('<p class="search-result mb-2">').text(searchResult[i]).appendTo('#search-result__list');
      }

      // ヒットの件数をページに出力
      hitNum = '<span>検索結果</span>：' + searchResult.length + '件見つかりました。';
      $('.search-result__hit-num').append(hitNum);
    }
  };

  var addMember = function(next){
    var memberScreenName = $(this).text();
    $('<span class="added-member">').text(memberScreenName).appendTo('#added-members');
    searchWord();
    generateInput();
  };

  var removeMember = function(next){
    $(this).remove();
    searchWord();
    generateInput();
  }

  var generateInput = function(){
    $('#added-inputs').empty();
    $('.added-member').each(function(){
      $('<input class="input-member" name="members[]">').val($(this).text()).appendTo('#added-inputs');
    });
  }

  // searchWordの実行
  $('#search-user').on('input', searchWord);
  $(document).on('click', '.search-result', addMember);
  $(document).on('click', '.added-member', removeMember);

});
