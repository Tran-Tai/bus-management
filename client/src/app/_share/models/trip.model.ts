export interface Trip{
  id: number;
  date:Date;
  route_id?: number;
  number:number;
  bus_id?:number;
  driver_id?:number;
  ticket_collector_id?:number;
  operator_id?:number;
  start_time:number;
  end_time:number;
  bus_number:string;
  driver_name:string;
  ticket_collector_name:string;
  route_name:string;
}
