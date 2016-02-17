                      <h1>비교과과정 - {{mode}}</h1>

                      <button type="button" class="btn btn-default" ng-click="ShowNonsub('캠프')">캠프</button>
                      <button type="button" class="btn btn-default" ng-click="ShowNonsub('학회')">학회</button>

                      <form class="form-horizontal" role="form" ng-submit="addRow()">
                      <!-- 학부 선택 -->
                      <div class="form-group">
                           <label class="col-md-2 control-label">학부선택</label>
                           <select name="course" ng-model="course">
                           <option ng-repeat="course in courses" value="{{course}}">{{course}}</option>
                           </select>
                      </div>
                      <!--  항목 선택 ex) 인문사회-->
                      <div class="form-group">
                           <label class="col-md-2 control-label">항목선택</label>
                           <select name="area" ng-model="area">
                           <option ng-repeat="area in areas" value="{{area}}">{{area}}</option>
                           </select>
                      </div>

                      <div class="form-group">
                           <label class="col-md-2 control-label">이름</label>
                           <div class="col-md-4">
                           <input type="text" class="form-control" name="name" ng-model="name" />
                           </div>
                      </div>

                      <div class="form-group">                
                           <div style="padding-left:110px">
                           <input type="submit" value="Submit" class="btn btn-primary"/>
                           </div>
                      </div>
                      </form>


                      <table class="table">
                      <tr>
                       <th>학부명       </th>
                      <th>항목명        </th>
                      <th>비교과명     </th>
                      <th>Action         </th>
                      </tr>
                      <tr ng-repeat="nonsub in nonsubs | orderBy:'name'">
                      <td>{{nonsub.course}}</td>
                      <td>{{nonsub.area}}</td>
                      <td>{{nonsub.name}}</td>
                      <td>
                      <input type="button" value="Remove" class="btn btn-warning" ng-click="removeRow(nonsub)"/>
                      </td>
                      </tr>
                      </table>