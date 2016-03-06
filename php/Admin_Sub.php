<div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
                <button type="button" class="nonsub_button" >교과과정</button>

                <div class="col-md-12">
                <input type="text" class="form-control search" name="name" ng-model="searchKeyword" placeholder="Search" />
                </div>

            <form class="form-horizontal" role="form" ng-submit="addRow()">
                  <!-- 항목 선택 -->
                  <div class="form-group">
                        <label class="col-md-4 control-label">항목선택</label>
                        <select name="article" ng-model="article">
                        <option ng-repeat="article in articles" value="{{article}}">{{article}}</option>
                        </select>
                  </div>
                  <!--  학점선택-->
                  <div class="form-group">
                        <label class="col-md-4 control-label">학점선택</label>
                        <select name="credit" ng-model="credit">
                        <option ng-repeat="credit in credits" value="{{credit}}">{{credit}}</option>
                        </select>
                  </div>

                  <div class="form-group">
                        <label class="col-md-4 control-label">이름</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control" name="sub_name" ng-model="sub_name" />
                        </div>
                  </div>

                  <div class="form-group">                
                        <div style="padding-left:110px">
                        <input type="submit" value="등록" class="btn btn-primary btn-lg"/>
                        </div>
                  </div>
            </form>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div  class="container-fluid page_container">   
            <div class="alert-box success">정보가 등록되었습니다</div>
            <div class="alert-box warning">정보가 삭제되었습니다</div>
            <div class="alert-box failure">요청하신 명령에 실패하였습니다</div>

            <h1>교과과정</h1>
            <table class="table">
                  <tr>
                  <th>항목명        </th>
                  <th>교과명        </th>
                  <th>학점            </th>
                  <th>Action         </th>
                  </tr>
                  <tr dir-paginate="sub in subs | itemsPerPage: 10 | filter:searchKeyword " current-page="currentPage" >
                  <td>{{sub.article}}</td>
                  <td>{{sub.sub_name}}</td>
                  <td>{{sub.credit}}</td>
                  <td>
                  <input type="button" value="삭제" class="btn btn-warning" ng-click="removeRow(sub)"/>
                  </td>
                  </tr>
            </table>
     



             <!-- Pagination Part (dirPagination모듈 사용)-->
            <div class="text-center">
                 <dir-pagination-controls boundary-links="true"  direction-links="true" max-size="7" 
                 on-page-change="pageChangeHandler(newPageNumber)" template-url="dirPagination.tpl.html">
           </dir-pagination-controls>
            </div>
      </div>
</div>