<div id="wrapper">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
            <button type="button" class="nonsub_button left" ng-click="ShowNonsub('캠프')">캠프</button>
            <button type="button" class="nonsub_button right" ng-click="ShowNonsub('학회')">학회</button>
            
                  <div class="col-md-12">
                  <input type="text" class="form-control search" name="name" ng-model="searchKeyword" placeholder="Search" />
                  </div>

            <form class="form-horizontal" role="form" ng-submit="addRow()">
                  <!-- 학부 선택 -->
                  <div class="form-group">
                        <label class="col-md-4 control-label">학부선택</label>
                        <select name="course" ng-model="course">
                        <option ng-repeat="course in courses" value="{{course}}">{{course}}</option>
                        </select>
                  </div>
                  <!--  항목 선택 ex) 인문사회-->
                  <div class="form-group">
                        <label class="col-md-4 control-label">항목선택</label>
                        <select name="area" ng-model="area">
                        <option ng-repeat="area in areas" value="{{area}}">{{area}}</option>
                        </select>
                  </div>

                  <div class="form-group">
                        <label class="col-md-4 control-label">이름</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control" name="name" ng-model="name" />
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
            <h1>비교과과정 - {{mode}}</h1>
            <table class="table">
                  <tr>
                  <th>학부명       </th>
                  <th>항목명        </th>
                  <th>비교과명     </th>
                  <th>Action         </th>
                  </tr>
                  <tr dir-paginate="nonsub in nonsubs | itemsPerPage: 10 | orderBy:'name' | filter:searchKeyword ">
                  <td>{{nonsub.course}}</td>
                  <td>{{nonsub.area}}</td>
                  <td>{{nonsub.name}}</td>
                  <td>
                  <input type="button" value="삭제" class="btn btn-warning" ng-click="removeRow(nonsub)"/>
                  </td>
                  </tr>
            </table>
            <!-- Pagination Part (dirPagination모듈 사용)-->
            <dir-pagination-controls
                  max-size="7"
                  direction-links="true"
                  boundary-links="true">
            </dir-pagination-controls>
      </div>
</div>