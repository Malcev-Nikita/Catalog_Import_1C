<?
AddEventHandler("catalog", "OnSuccessCatalogImport1C", "myCustomImportMod");


function myCustomImportMod($arg1, $arg2 = false) {
	$IBLOCK_ID = 46;
    $WIDTH = "SHIRINA_MM";
    $LENGTH = 'DLINA_MM';
    $HEIGHT = 'VYSOTA_MM';
    $WEIGHT = 'VES_GR';


	$el = new CIBlockElement;
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
	$arFilter = Array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
	while($ob = $res->GetNextElement()) { 
		$arProps = $ob->GetProperties();
		$arFields = $ob->GetFields();

		CCatalogProduct::Update(
			$arFields['ID'], 
			Array(
				"WIDTH" => $arProps[$WIDTH]['VALUE'],
				"LENGTH" => $arProps[$LENGTH]['VALUE'],
				"HEIGHT" => $arProps[$HEIGHT]['VALUE'],
				"WEIGHT" => $arProps[$WEIGHT]['VALUE']
			)
		);
	}
}
?>