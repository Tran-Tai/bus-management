import { Route } from "./route.model";
import { Station } from "./station.model";

export interface RouteData {
  route: Route,
  first_route_stations : Array<Station>,
  second_route_stations: Array<Station>
}
