import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  template: `
  <a routerLink="/manager">Manager</a>
  <router-outlet></router-outlet>
  `,
  styles: []
})
export class AppComponent {
  title = 'Hello App';

  constructor() {
    console.log('reload')
  }
}
