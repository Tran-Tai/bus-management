export interface Result {
    path :[{
      route_id:number;
      route_number:number;
      route_name:string;
    }];
    station :[{
      station_id:number;
      station_name:string;
      time:Date;
    }]
}
