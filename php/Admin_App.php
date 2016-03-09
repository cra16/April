<div class="alert-box success">정보가 등록되었습니다</div>
<div class="alert-box warning">정보를 입력해주세요</div>
<div class="alert-box failure">요청하신 명령에 실패하였습니다</div>

<h1>지원정보</h1>
<div class="col-md-4">
<input type="text" class="form-control search" name="name" ng-model="searchKeyword" placeholder="Search" />
</div>

      <!-- 학부 선택 -->
<table class="table">
	<tr>
	<th>이름	</th>
	<th>지원서 번호 </th>
	<th>인증제도</th>
	<th>인증항목</th>
	<th>비교과 과정</th>
	<th>상태</th>
  	<th>Action</th>
	</tr>

	<tr ng-controller ="app_Ctrl"  dir-paginate="app in apps | filter:searchKeyword | itemsPerPage: 10">

	<td> {{app.name}}   </td>	<!--이름-->

	<td> <input type="text" name="serial_num" ng-model="serial_num" ng-value = "{{app.serial_num}}"></td>
	<td> {{app.kind}}   </td>	<!--인증제도-->
	<td> {{app.area}}   </td>	<!--인증항목-->	
	<td> {{app.nonsub}} </td>	<!--비교과 과정-->
	<td>						<!--상태-->	
	<select name="stat" ng-model="stat">
	<option disabled value="{{status}}">{{app.status}}</option>	<!--default value-->
	<option ng-repeat="stat in stats" value="{{stat}}">{{stat}}</option>

	</select>    
	</td>	
	<td>
	<input type="submit" value="수정" class="btn btn-warning" ng-click="updateRow(app)"/>
	</td>
	</tr>
</table>
            <div class="text-center">
                  <dir-pagination-controls
                  max-size="7"
                  direction-links="true"
                  boundary-links="true">
                  </dir-pagination-controls>
            </div>
</div>