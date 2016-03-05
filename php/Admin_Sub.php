<div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
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
                        <div class="col-md-7">
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
            <h1>교과과정</h1>
            <table class="table">
                  <tr>
                  <th>항목명        </th>
                  <th>교과명        </th>
                  <th>학점            </th>
                  <th>Action         </th>
                  </tr>
                  <tr dir-paginate="sub in subs | itemsPerPage: 20 | orderBy:'sub_name' | filter:searchKeyword ">
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
                  <dir-pagination-controls
                  max-size="7"
                  direction-links="true"
                  boundary-links="true">
                  </dir-pagination-controls>
            </div>
      </div>
</div>