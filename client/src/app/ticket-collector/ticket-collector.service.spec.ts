import { TestBed } from '@angular/core/testing';

import { TicketCollectorService } from './ticket-collector.service';

describe('TicketCollectorService', () => {
  let service: TicketCollectorService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(TicketCollectorService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
