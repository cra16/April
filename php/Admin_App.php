<h1>지원정보</h1>
<table class="table">
	<tr>
	<th>이름	</th>
	<th>학번	</th>
	<th>인증제도 	</th>
	<th>인증항목	</th>
	<th>비교과	</th>
	<th>Action	</th>
	</tr>
	<tr ng-repeat="app in apps | orderBy:'kind'">
	<td>{{app.kind}}    </td>
	<td>{{app.area}}   </td>
	<td>{{app.status}} </td>
	<td>{{app.field}}    </td>
	<th>비교과            </th>
	<td>
	<input type="button" value="Remove" class="btn btn-warning" ng-click="removeRow(app)"/>
	</td>
	</tr>
</table>
