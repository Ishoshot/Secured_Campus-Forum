$app_id = @@APPLICATION;
$requestor = "Ishola";
$rejector = "Mayowa";
$rejected_date = getCurrentdate();
$rejected_reason = "I actually have no reason";

$sql = "INSERT INTO PMT_REJECTED_CASES (APP_ID, REQUESTOR, REJECTOR, REJECTED_DATE, REJECTED_REASON) 
		VALUES ($app_id,$requestor,$rejector,$rejected_date,$rejected_reason)";
dd($sql);
$result = executeQuery($sql);

if($result == 1)
{
	@@resp = "Record Inserted!!!";
}
else
{
	@@resp =  "Error Encountered!!!"
}
