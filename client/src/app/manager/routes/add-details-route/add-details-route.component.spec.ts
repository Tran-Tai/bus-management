import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AddDetailsRouteComponent } from './add-details-route.component';

describe('AddDetailsRouteComponent', () => {
  let component: AddDetailsRouteComponent;
  let fixture: ComponentFixture<AddDetailsRouteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AddDetailsRouteComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AddDetailsRouteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
