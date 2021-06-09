import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateBusesComponent } from './create-buses.component';

describe('CreateBusesComponent', () => {
  let component: CreateBusesComponent;
  let fixture: ComponentFixture<CreateBusesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CreateBusesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateBusesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
