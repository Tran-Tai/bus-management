import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListRouteDayComponent } from './list-route-day.component';

describe('ListRouteDayComponent', () => {
  let component: ListRouteDayComponent;
  let fixture: ComponentFixture<ListRouteDayComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ListRouteDayComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ListRouteDayComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
