import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailStationComponent } from './detail-station.component';

describe('DetailStationComponent', () => {
  let component: DetailStationComponent;
  let fixture: ComponentFixture<DetailStationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DetailStationComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DetailStationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
