<?php

require_once(dirname(__FILE__) . '/CircuiTreeApiClient.php');

class CircuiTreeApiClientMock extends CircuiTreeApiClient{

    public function getTransportationOptions()
    {
        $data = '{"StatusCode":1,"StatusMessage":"Success","Results":"[{\"FirstName\":\"Auriane\",\"LastName\":\"Chevalier\",\"EventLocation\":\"K-2\",\"Event\":\"2019 K-2 \/ Four Weeks \/ Term 2\",\"TransportationType\":\"Shuttle\",\"TransportationDescription\":\"Springfield (SGF) to Kamp\",\"Status\":\"On Hold\",\"Fee\":80.0000,\"FromPlace\":\"Springfield\\\\Branson National Airport\",\"FromAddress\":\"2300 N. Airport Rd.\",\"FromCity\":\"Springfield\",\"FromState\":\"MO\",\"FromZip\":\"65802\",\"TransportationLocationCode\":\"SGF\",\"LoadDetails\":\"Flights must be between the hours of 9 am - 6 pm. \",\"Fee1\":80.0000,\"TransportationDate\":\"07\/13\/2019\",\"TransportationDirection\":\"Incoming\",\"LastModifiedDate\":\"2019-01-28T07:29:10\",\"EntityID\":877433,\"RegistrationID\":615761},{\"FirstName\":\"Auriane\",\"LastName\":\"Chevalier\",\"EventLocation\":\"K-2\",\"Event\":\"2019 K-2 \/ Four Weeks \/ Term 2\",\"TransportationType\":\"Shuttle\",\"TransportationDescription\":\"Springfield (SGF) from Kamp\",\"Status\":\"On Hold\",\"Fee\":80.0000,\"FromPlace\":\"Springfield\\\\Branson National Airport\",\"FromAddress\":\"2300 N. Airport Rd.\",\"FromCity\":\"Springfield\",\"FromState\":\"MO\",\"FromZip\":\"65802\",\"TransportationLocationCode\":\"SGF\",\"LoadDetails\":\"Flights must be between the hours of 9 am - 6 pm. \",\"Fee1\":80.0000,\"TransportationDate\":\"08\/09\/2019\",\"TransportationDirection\":\"Outgoing\",\"LastModifiedDate\":\"2019-01-28T07:29:10\",\"EntityID\":877433,\"RegistrationID\":615761}]"}';

        $response = json_decode($data, true);

        $response['Results'] = addcslashes($response['Results'], '\\');

        return json_decode($response['Results'], true);
    }

    public function getFamilyInfo()
    {
        $data = '{"StatusCode":1,"StatusMessage":"Success","Results":"[{\"ParentName\":\"Lyle Quiring\",\"FamilyEntityID\":474661,\"FamilyName\":\"Lyle Quiring Family\",\"ChildFirstName\":\"Landon\",\"ChildLastName\":\"Quiring\",\"Age\":13,\"Gender\":\"M\",\"ChildEntityID\":387501,\"BoyTribe\":\"Choctaw\",\"ChildPhotoURL\":\"https:\/\/register.kanakuk.com\/Photo\/GetEntityThumb\/235468?w=188&h=250\"},{\"ParentName\":\"Lyle Quiring\",\"FamilyEntityID\":474661,\"FamilyName\":\"Lyle Quiring Family\",\"ChildFirstName\":\"Logan\",\"ChildLastName\":\"Quiring\",\"Age\":11,\"Gender\":\"M\",\"ChildEntityID\":389694,\"BoyTribe\":\"Choctaw\",\"ChildPhotoURL\":\"https:\/\/register.kanakuk.com\/Photo\/GetEntityThumb\/235633?w=188&h=250\"}]"}';

        $response = json_decode($data, true);

        $response['Results'] = addcslashes($response['Results'], '\\');
        
        return json_decode($response['Results'], true);
    }

}
