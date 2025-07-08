// const json = JSON.parse(response.data); 
    const DataRiskJsonString = {
    "data": {
    "ResultState": true,
    "ResultCode": 1200,
    "ResultDesc": "Operation Was Successful",
    "ResponseData": {
        "riskData": [
            {
                "id": 2,
                "ObjType": null,
                "parent_id": null,
                "Name": "HR Department",
                "Acronym": "HR",
                "Manager": 2,
                "UserSign1": null,
                "UserSign2": null,
                "UserSign3": null,
                "created_at": "2022-09-30T06:47:43.000000Z",
                "updated_at": "2022-09-30T06:47:43.000000Z",
                "riskData": [
                    {
                        "count": 1,
                        "RiskID": 1,
                        "RiskName": "Inadequate staffing",
                        "InherentValue": 16,
                        "ResidualValue": 9,
                        "TotalQuestions": 0,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    }
                ]
            },
            {
                "id": 3,
                "ObjType": null,
                "parent_id": null,
                "Name": "ERM",
                "Acronym": "ERM",
                "Manager": null,
                "UserSign1": null,
                "UserSign2": null,
                "UserSign3": null,
                "created_at": "2022-10-18T10:30:54.000000Z",
                "updated_at": "2022-10-18T10:30:54.000000Z",
                "riskData": [
                    {
                        "count": 1,
                        "RiskID": 6,
                        "RiskName": "Poor risk culture within Smartedge",
                        "InherentValue": 12,
                        "ResidualValue": 6,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 2,
                        "RiskID": 7,
                        "RiskName": "Inadequate project risk management",
                        "InherentValue": 20,
                        "ResidualValue": 12,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 4,
                        "RiskID": 8,
                        "RiskName": "Non compliance to risk appetite statement and tolerance levels",
                        "InherentValue": 9,
                        "ResidualValue": 6,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    }
                ]
            },
            {
                "id": 6,
                "ObjType": null,
                "parent_id": null,
                "Name": "ICT",
                "Acronym": "ICT",
                "Manager": null,
                "UserSign1": null,
                "UserSign2": null,
                "UserSign3": null,
                "created_at": "2022-10-18T10:30:56.000000Z",
                "updated_at": "2022-10-18T10:30:56.000000Z",
                "riskData": [
                    {
                        "count": 1,
                        "RiskID": 30,
                        "RiskName": "Ineffecient ICT help desk",
                        "InherentValue": 16,
                        "ResidualValue": 12,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 2,
                        "RiskID": 31,
                        "RiskName": "System downtime",
                        "InherentValue": 16,
                        "ResidualValue": 9,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 4,
                        "RiskID": 32,
                        "RiskName": "Cyber Security threats e.g hacking, phishing attacks, email spoofing, ransomware and malware",
                        "InherentValue": 20,
                        "ResidualValue": 8,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 8,
                        "RiskID": 33,
                        "RiskName": "Inadequate Disaster Recovery plan",
                        "InherentValue": 16,
                        "ResidualValue": 6,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 16,
                        "RiskID": 34,
                        "RiskName": "Use of Obsolete  technology",
                        "InherentValue": 12,
                        "ResidualValue": 9,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    },
                    {
                        "count": 32,
                        "RiskID": 35,
                        "RiskName": "unauthorized database alterations ",
                        "InherentValue": 12,
                        "ResidualValue": 9,
                        "TotalQuestions": 1,
                        "NonCompliance": 9,
                        "TotalKRIs": 1,
                        "RedKRIs": 0,
                        "NotStartedOverdue": 1,
                        "WIPOverdue": 9
                    }
                ]
            }
        ],
        "summaryReports": {
            "totalRisks": 6,
            "totalRedRisks": 6,
            "totalMediumRisks": 4,
            "totalGreenRisks": 0
        }
    }
},
};





export default DataRiskJsonString;