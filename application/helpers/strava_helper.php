<?php
//use Pest;
use Strava\API\Client;
use Strava\API\Exception;
use Strava\API\Service\REST;


if (!function_exists('stravaConnect'))
{
    function stravaGetACivities($appKey)
    {
      try {
          $adapter = new Pest('https://www.strava.com/api/v3');
          $service = new REST($appKey, $adapter);  // Define your user token here..
          $client = new Client($service);

          $activities = [];
          $exit = false;
          $page = 1;
          while(!$exit) {
              $temp = $client->getAthleteActivities(null, null, $page, 200);
              if(!empty($temp)) {
                if($page == 1) {
                  $activities = $temp;
                } else {
                  $activities = array_merge_recursive($activities, $temp);
                }
                $page ++;
              } else {
                $exit = true;
              }
          }

          return $activities;

        }catch (Pest_Unauthorized $ex) {
            return array('error' => $ex->getMessage());
        } catch(Exception $e) {
            print $e->getMessage();
        }
    }
}

if (!function_exists('exportToCsv'))
{
    function exportToCsv($tabData)
    {
        $parser = new \CsvParser\Parser();
        $parser->fieldDelimiter = ';';
        $csv = $parser->fromArray($tabData);
        $date = date('Ymd');
        $filename = $date."_actitivities.csv";

        // use the parser to convert the csv object to a string
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename.';');
        echo $parser->toString($csv);
        die();
    }
}

if (!function_exists('createHeaders'))
{
    function createHeaders($headerToIgnore, $activitiesArray) {
        $maxArray = [];
        $countMaxArray = 0;
        foreach($activitiesArray as $act) {
            $count = count($act);
            if($count > $countMaxArray) {
                //get the biggest array to have a maximum oh headers
                $maxArray = $act;
                $countMaxArray = $count;
            }
        }
        $headerTab = array_keys($maxArray);
        return array_values(array_diff($headerTab, $headerToIgnore));
    }
}
if (!function_exists('initBlankLine'))
{
    function initBlankLine($headerTab) {
      $tab = [];
      foreach($headerTab as $key => $value){
          $tab[$value] = "";
      }
      return $tab;
    }
}
