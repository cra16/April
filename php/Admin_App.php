<h1>지원정보</h1>
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
	<tr ng-repeat="app in apps | orderBy:'kind'">
		<td> {{app.name}}   </td>	<!--이름-->
		<td> {{app.serial_num}}		<!--Serial Number-->	
	       <input type="text" name="serial_num" ng-model="serial_num" value "{{app.serial_num}}">  
	    </td>
		<td> {{app.kind}}   </td>	<!--인증제도-->
		<td> {{app.area}}   </td>	<!--인증항목-->	
		<td> {{app.nonsub}} </td>	<!--비교과 과정-->
		<td>						<!--상태-->	
	       <select name="status" ng-model="status" value "{{app.status}}">
	       		<option value="{{status}}">{{app.status}}</option>	<!--default value-->
	       		<option ng-repeat="status in all_status" value="{{status}}">{{status}}</option>
	       </select>    
	    </td>	
		<td>
			<input type="button" value="수정" class="btn btn-warning" ng-click="updateRow(app)"/>
		</td>
	</tr>
</table>
