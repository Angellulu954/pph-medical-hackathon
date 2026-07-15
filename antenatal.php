public function evaluateAntenatal($patient)
{
    $result = [
        "risk" => "LOW",
        "reasons" => [],
        "recommendations" => []
    ];

    $rules = [

        [
            "condition" => $patient->previous_pph,
            "risk" => "HIGH",
            "reason" => "History of previous postpartum haemorrhage",
            "recommendation" => "Plan delivery in a facility with blood bank."
        ],

        [
            "condition" => $patient->multiple_pregnancy,
            "risk" => "HIGH",
            "reason" => "Multiple pregnancy",
            "recommendation" => "Close obstetric monitoring."
        ],

        [
            "condition" => $patient->preeclampsia,
            "risk" => "HIGH",
            "reason" => "Pre-eclampsia",
            "recommendation" => "Refer to specialist care."
        ],

        [
            "condition" => $patient->placenta_previa,
            "risk" => "HIGH",
            "reason" => "Placenta previa",
            "recommendation" => "Hospital delivery required."
        ],

        [
            "condition" => $patient->placenta_accreta,
            "risk" => "HIGH",
            "reason" => "Placenta accreta",
            "recommendation" => "Prepare surgical team and blood products."
        ],

        [
            "condition" => $patient->haemoglobin < 9,
            "risk" => "MODERATE",
            "reason" => "Severe anaemia",
            "recommendation" => "Treat anaemia before delivery."
        ],

        [
            "condition" => $patient->estimated_weight >= 4000,
            "risk" => "MODERATE",
            "reason" => "Large baby (Macrosomia)",
            "recommendation" => "Monitor labour closely."
        ],

        [
            "condition" => $patient->antepartum_bleeding,
            "risk" => "HIGH",
            "reason" => "Bleeding during pregnancy",
            "recommendation" => "Immediate obstetric review."
        ],

        [
            "condition" => $patient->bleeding_disorder,
            "risk" => "HIGH",
            "reason" => "Bleeding disorder",
            "recommendation" => "Prepare blood products."
        ],

        [
            "condition" => $patient->liver_disease,
            "risk" => "HIGH",
            "reason" => "Liver disease",
            "recommendation" => "Specialist management."
        ],

        [
            "condition" => $patient->age >= 40,
            "risk" => "MODERATE",
            "reason" => "Advanced maternal age",
            "recommendation" => "Increase monitoring."
        ],

        [
            "condition" => $patient->bmi >= 35,
            "risk" => "MODERATE",
            "reason" => "Maternal obesity",
            "recommendation" => "Hospital delivery recommended."
        ]

    ];

    foreach ($rules as $rule) {

        if ($rule["condition"]) {

            $result["reasons"][] = $rule["reason"];
            $result["recommendations"][] = $rule["recommendation"];

            if ($rule["risk"] == "HIGH") {
                $result["risk"] = "HIGH";
            }
            elseif ($result["risk"] != "HIGH") {
                $result["risk"] = "MODERATE";
            }
        }

    }

    return $result;
}